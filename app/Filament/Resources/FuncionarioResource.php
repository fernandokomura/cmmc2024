<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FuncionarioResource\Pages;
use App\Filament\Resources\FuncionarioResource\RelationManagers;
use App\Models\Funcionario;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FuncionarioResource extends Resource
{
    protected static ?string $model = Funcionario::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $slug = 'funcionarios';

    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?string $modelLabel = 'Funcionário';

    protected static ?string $pluralModelLabel = 'Funcionários';

    public static function getNavigationGroup(): ?string
    {
        return 'Câmara';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->schema(
                    [
                        Forms\Components\TextInput::make('nome')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('rgf')
                            ->label('RGF')
                            ->required()
                            ->numeric()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\Select::make('user_id')
                            ->label('Usuário do sistema')
                            ->relationship('user', 'name')
                            ->searchable(),
                        Forms\Components\Select::make('setor_id')
                            ->label('Setor')
                            ->relationship('setor', 'nome')
                            ->preload()
                            ->searchable(),
                    ])
                ->columns(2)
                ->columnSpan(['lg' => fn (?Funcionario $record) => $record === null ? 3 : 2]),
                static::getRegisterForm(),
            ])
            ->columns(3);
    }

    public static function getRegisterForm(): Section
    {
        return Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Criado em')
                        ->content(fn (Funcionario $record): ?string => $record->created_at?->diffForHumans()),

                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Ùltima Modificação')
                        ->content(fn (Funcionario $record): ?string => $record->updated_at?->diffForHumans()),
                ])
                ->columnSpan(['lg' => 1])
                ->hidden(fn (?Funcionario $record) => $record === null);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFuncionarios::route('/'),
            'create' => Pages\CreateFuncionario::route('/create'),
            'view' => Pages\ViewFuncionario::route('/{record}'),
            'edit' => Pages\EditFuncionario::route('/{record}/edit'),
        ];
    }
}
