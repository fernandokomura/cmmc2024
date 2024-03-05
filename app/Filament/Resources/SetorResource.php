<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SetorResource\Pages;
use App\Filament\Resources\SetorResource\RelationManagers;
use App\Models\Setor;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SetorResource extends Resource
{
    protected static ?string $model = Setor::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $slug = 'setores';

    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?string $modelLabel = 'Setor';

    protected static ?string $pluralModelLabel = 'Setores';

    public static function getNavigationGroup(): ?string
    {
        return 'Câmara';
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make()
            ->schema([
                TextInput::make('nome')
                    ->required()
                    ->unique(ignoreRecord:true)
                    ->label('Nome'),
                Toggle::make('gabinete')
                    ->label('Gabinete?')
                    ->inline(false),

            ])
            ->columns(2)
            ->columnSpan(['lg' => fn (?Setor $record) => $record === null ? 3 : 2]),

            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Criado em')
                        ->content(fn (Setor $record): ?string => $record->created_at?->diffForHumans()),

                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Ùltima Modificação')
                        ->content(fn (Setor $record): ?string => $record->updated_at?->diffForHumans()),
                ])
                ->columnSpan(['lg' => 1])
                ->hidden(fn (?Setor $record) => $record === null),
        ])
        ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageSetors::route('/'),
        ];
    }
}
