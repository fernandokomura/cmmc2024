<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipamentoResource\Pages;
use App\Filament\Resources\EquipamentoResource\RelationManagers;
use App\Models\Equipamento;
use Filament\Forms;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipamentoResource extends Resource
{
    protected static ?string $model = Equipamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $slug = 'equipamentos';

    protected static ?string $recordTitleAttribute = 'descricao';

    protected static ?string $modelLabel = 'Equipamento';

    protected static ?string $pluralModelLabel = 'Equipamentos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema(static::getForm())
                    ->columns(2)
                    ->columnSpan(['lg' => fn (?Equipamento $record) => $record === null ? 3 : 2]),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Criado em')
                            ->content(fn (Equipamento $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Ùltima Modificação')
                            ->content(fn (Equipamento $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Equipamento $record) => $record === null),

                Forms\Components\Section::make()
                    ->schema([
                        Repeater::make('atributos')
                        ->schema([
                            TextInput::make('nome')
                                ->required()
                                ->label('Nome'),
                            TextInput::make('valor')
                                ->required()
                                ->label('Valor'),
                        ])
                        ->addActionLabel('Adicionar Atributo')
                        ->defaultItems(0)
                        ->columns(2)
                        ->columnSpan(['lg' => fn (?Equipamento $record) => $record === null ? 3 : 2]),
                    ])
                    ->columnSpan(['lg' => fn (?Equipamento $record) => $record === null ? 3 : 2]),


            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('descricao')
                ->label('Descrição')
                ->searchable()
                ->sortable(),
                TextColumn::make('patrimonio')
                ->label('Patrimônio')
                ->searchable()
                ->sortable(),
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

    public static function getForm(): array
    {
        return [
            TextInput::make('descricao')
                ->required()
                ->label('Descrição'),
            TextInput::make('patrimonio')
                ->required()
                ->label('Patrimônio'),
            Textarea::make('observacao')
                ->label('Observação'),
            // KeyValue::make('atributos')
            //     ->addActionLabel('Adicionar Atributo'),
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
            'index' => Pages\ListEquipamentos::route('/'),
            'create' => Pages\CreateEquipamento::route('/create'),
            'edit' => Pages\EditEquipamento::route('/{record}/edit'),
        ];
    }
}
