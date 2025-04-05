<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\EmployeeType;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use GuzzleHttp\ClientInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make("starts_at")
                    ->seconds(false)
                    ->required()
                    ->timezone(env("CLIENT_DATETIME_TIMEZONE"))
                    ->dehydrateStateUsing(function(string $state): string{
                        $date_format = Carbon::parse($state, env("CLIENT_DATETIME_TIMEZONE"));
                        return $date_format->timezone("UTC")->toDateTimeString();
                    }),
                Forms\Components\DateTimePicker::make("ends_at")
                    ->seconds(false)
                    ->afterOrEqual("starts_at")
                    ->required()
                    ->timezone(env("CLIENT_DATETIME_TIMEZONE"))
                    ->dehydrateStateUsing(function(string $state): string{
                        $date_format = Carbon::parse($state, env("CLIENT_DATETIME_TIMEZONE"));
                        return $date_format->timezone("UTC")->toDateTimeString();
                    }),
                Forms\Components\Select::make("clients")
                    ->relationship("clients", "name")
                    ->preload()
                    ->multiple()
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make("name")
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make("email")
                            ->required()
                            ->email()
                            ->maxLength(100),
                        Forms\Components\TextInput::make("phone_number")
                            ->required()
                            ->maxLength(12),
                    ])->required(),
                Forms\Components\Select::make("services")
                    ->relationship("services", "service_name")
                    ->preload()
                    ->multiple()
                    ->required(),
                Forms\Components\Select::make("employees")
                    ->relationship("employees", modifyQueryUsing: function(Builder $query){
                        return $query->leftJoinRelationship("employee_type")->where("type_name", "=", "admin");
                    })
                    ->getOptionLabelFromRecordUsing(function (Model $model): string {
                        return $model->users->name;
                    })
                    ->preload()
                    ->multiple(),

                Forms\Components\Textarea::make("note"),
            
                Forms\Components\Fieldset::make("Status")
                    ->schema([
                        Forms\Components\Checkbox::make("done"),
                        Forms\Components\Checkbox::make("is_canceled"),
                    ])
                    ->hidden(function(string $operation){
                        if($operation === "edit")
                        {
                            return false;
                        }
                        return true;
                    }),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id")->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("starts_at")
                    ->searchable()
                    ->dateTime()
                    ->timezone(env("CLIENT_DATETIME_TIMEZONE")),
                Tables\Columns\TextColumn::make("ends_at")
                    ->searchable()
                    ->dateTime()
                    ->timezone(env("CLIENT_DATETIME_TIMEZONE")),
            ])->defaultSort("created_at", 'desc')
            ->filters([
                Filter::make("starts_at")
                    ->form([
                        DatePicker::make("starts_at")->timezone(env("CLIENT_DATETIME_TIMEZONE"))
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data["starts_at"], 
                            function(Builder $query, $date): Builder {                    
                                $start = Carbon::parse($date, env("CLIENT_DATETIME_TIMEZONE"))->startOfDay()->setTimezone(config("app.timezone"));
                                $end = Carbon::parse($date, env("CLIENT_DATETIME_TIMEZONE"))->endOfDay()->setTimezone(config("app.timezone"));
                                $q = $query
                                    ->where("starts_at", ">=", $start, "and")
                                    ->where("starts_at", "<=", $end);
                                return $q;
                        });
                    })
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //RelationManagers\EmployeesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
