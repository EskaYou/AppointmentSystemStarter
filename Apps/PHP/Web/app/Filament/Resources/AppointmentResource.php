<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use GuzzleHttp\ClientInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schema;

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
                    ->timezone("Asia/Singapore"),
                Forms\Components\DateTimePicker::make("ends_at")
                    ->seconds(false)
                    ->required()
                    ->timezone("Asia/Singapore"),
                Forms\Components\Select::make("clients")
                    ->relationship("clients", "name")
                    ->preload()
                    ->multiple()
                    ->required(),
                Forms\Components\Select::make("services")
                    ->relationship("services", "service_name")
                    ->preload()
                    ->multiple()
                    ->required(),
                Forms\Components\Select::make("employees")
                    ->relationship("employees")
                    ->getOptionLabelFromRecordUsing(function (Model $model){
                        return $model->users->name;
                    })
                    ->preload()
                    ->multiple()
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id")->sortable(),
                Tables\Columns\TextColumn::make("starts_at")
                    ->dateTime()
                    ->timezone("Asia/Singapore"),
                Tables\Columns\TextColumn::make("ends_at")
                    ->dateTime()
                    ->timezone("Asia/Singapore"),
            ])
            ->filters([
                //
            ])
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
