<?php

namespace App\Filament\Resources;

use App\Actions\Setters\SetAdressFromZipCode;
use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Cliente';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Client Information'))
                        ->columns(2)
                        ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('name'))
                                    ->required(),
                                Forms\Components\TextInput::make('cpf_cnpj')                                    
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label(__('email'))
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('phone')
                                    ->label(__('phone'))
                                    ->tel()
                                    ->required(),
                ]),
                Section::make(__('address'))
                    ->columns(2)
                    ->schema([
                            Forms\Components\TextInput::make('zip_code')
                                ->label(__('zip code'))
                                ->afterStateUpdated(fn (Set $set, $state) => SetAdressFromZipCode::setAddress($state, $set))
                                ->required()
                                ->live(),
                            Forms\Components\TextInput::make('street')
                                ->label(__('street'))
                                ->required()
                                ->readOnly()
                                ->live(),
                            Forms\Components\TextInput::make('number')
                                ->label(__('number'))
                                ->numeric()
                                ->required()                                
                                ->live(),
                            Forms\Components\TextInput::make('complement')
                                ->label(__('complement'))
                                ->live(),
                            Forms\Components\TextInput::make('district')
                                ->label(__('district'))
                                ->required()
                                ->readOnly()
                                ->live(),
                            Forms\Components\TextInput::make('city')
                                ->label(__('city'))
                                ->required()
                                ->readOnly()
                                ->live(),
                            Forms\Components\TextInput::make('state')
                                ->label(__('state'))
                                ->required()
                                ->readOnly()
                                ->live(),                            
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label(__('name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('cpf_cnpj')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label(__('email'))
                    ->searchable()
                    ->icon('heroicon-m-envelope'),
                TextColumn::make('phone')
                    ->label(__('phone'))
                    ->searchable()
                    ->icon('heroicon-o-phone'),
                TextColumn::make('street')
                    ->label(__('street'))
                    ->searchable(),
                TextColumn::make('number')
                    ->label(__('number'))
                    ->searchable(),
                TextColumn::make('complement')
                    ->label(__('complement'))
                    ->searchable(),
                TextColumn::make('district')
                    ->label(__('district'))
                    ->searchable(),
                TextColumn::make('state')
                    ->label(__('state'))
                    ->searchable(),  
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\EditAction::make(),                    
                    Tables\Actions\DeleteAction::make(),
                ])
                ->label(false)
                ->button(false),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }   

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
