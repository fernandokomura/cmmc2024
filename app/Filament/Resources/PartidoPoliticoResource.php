<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartidoPoliticoResource\Pages;
use App\Filament\Resources\PartidoPoliticoResource\RelationManagers;
use App\Models\PartidoPolitico;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartidoPoliticoResource extends Resource
{
    protected static ?string $model = PartidoPolitico::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $slug = 'partidos-politicos';

    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?string $modelLabel = 'Partido Político';

    protected static ?string $pluralModelLabel = 'Partidos Políticos';

    public static function getNavigationGroup(): ?string
    {
        return 'Parlamentar';
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make()
            ->schema(static::getForm())
            ->columns(2)
            ->columnSpan(['lg' => fn (?PartidoPolitico $record) => $record === null ? 3 : 2]),

            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Criado em')
                        ->content(fn (PartidoPolitico $record): ?string => $record->created_at?->diffForHumans()),

                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Ùltima Modificação')
                        ->content(fn (PartidoPolitico $record): ?string => $record->updated_at?->diffForHumans()),
                ])
                ->columnSpan(['lg' => 1])
                ->hidden(fn (?PartidoPolitico $record) => $record === null),
            Forms\Components\Section::make()
                ->schema([
                    SpatieMediaLibraryFileUpload::make('logo')
                        ->collection('partido-logo')
                        ->responsiveImages()
                        ->image(),
                ])
        ])
        ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sigla')
                ->searchable(isIndividual: false)
                ->sortable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(isIndividual: false)
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getForm(): array
    {
        return [
            Forms\Components\TextInput::make('sigla')
                ->label('Sigla')
                ->maxLength(30)
                ->required()
                ->columnSpan(1),

            Forms\Components\TextInput::make('nome')
                ->label('Nome')
                ->maxLength(255)
                ->required()
                ->columnSpan(2),

            Forms\Components\DatePicker::make('data_criacao')
                ->label('Data de Criação')
                ->maxDate('today')
                ->required()
                ->columnSpan(1),

            Forms\Components\DatePicker::make('data_extincao')
                ->label('Data de Extinção')
                ->maxDate('today')
                ->columnSpan(1),

        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartidoPoliticos::route('/'),
            'create' => Pages\CreatePartidoPolitico::route('/create'),
            'view' => Pages\ViewPartidoPolitico::route('/{record}'),
            'edit' => Pages\EditPartidoPolitico::route('/{record}/edit'),
        ];
    }
}
