<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParlamentarResource\Pages;
use App\Filament\Resources\ParlamentarResource\RelationManagers;
use App\Helpers\Constants;
use App\Models\Parlamentar;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParlamentarResource extends Resource
{
    protected static ?string $model = Parlamentar::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $slug = 'parlamentares';

    protected static ?string $recordTitleAttribute = 'nome';

    protected static ?string $modelLabel = 'Parlamentar';

    protected static ?string $pluralModelLabel = 'Parlamentares';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema(static::getForm())
                    ->columns(2)
                    ->columnSpan(['lg' => fn (?Parlamentar $record) => $record === null ? 3 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Criado em')
                            ->content(fn (Parlamentar $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Ùltima Modificação')
                            ->content(fn (Parlamentar $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Parlamentar $record) => $record === null),

                Forms\Components\Section::make()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('foto')
                            ->collection('parlamentar-foto')
                            ->image()
                            ->responsiveImages()
                            ->imageEditor(),
                    ]),

            ])
            ->columns(3);
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
            'index' => Pages\ListParlamentars::route('/'),
            'create' => Pages\CreateParlamentar::route('/create'),
            'view' => Pages\ViewParlamentar::route('/{record}'),
            'edit' => Pages\EditParlamentar::route('/{record}/edit'),
        ];
    }

    public static function getForm(): array
    {
        return [
                TextInput::make('nome')
                    ->required()
                    ->label('Nome'),
                TextInput::make('nome_politico')
                    ->label('Nome Político'),
                DatePicker::make('data_nascimento')
                    ->label('Data de Nascimento'),
                TextInput::make('formacao')
                    ->label('Formação'),
                Select::make('nivel_intrucao')
                    ->options(Constants::NiveisInstrucao)
                    ->label('Nível de Instrução'),

                Select::make('partido_id')
                    ->relationship('partido', 'nome')
                    ->searchable()
                    ->createOptionForm(ParlamentarResource::PartidoForm())
                    ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                        return $action
                                ->modalHeading('Incluir Partido')
                                ->modalSubmitActionLabel('Incluir')
                                ->modalWidth('lg');
                    }),
                Select::make('setor_id')
                    ->relationship('gabinete', 'nome', modifyQueryUsing: fn (Builder $query) => $query->where('gabinete', '=', true))
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'unique' => 'Gabinete já cadastrado',
                    ])
                    ->native(false),
                Toggle::make('ativo')
                    ->label('Ativo')
                    ->inline(false),
                Toggle::make('suplente')
                    ->label('Suplente')
                    ->inline(false),
        ];
    }

    public static function PartidoForm():array
    {
        return [
            TextInput::make('nome')
                ->required()
                ->label('Nome'),

            TextInput::make('sigla')
                ->required()
                ->unique(ignoreRecord: true)
                ->label('Sigla'),
            DatePicker::make('data_criacaco')
                ->label('Data de Criação')
                ->maxDate('today')
                ->required(),
            DatePicker::make('data_extincao')
                ->label('Data de Extinção')
                ->maxDate('today'),
            SpatieMediaLibraryFileUpload::make('logo')
                ->collection('partido-logo')
                ->image()
                ->responsiveImages()
                ->imageEditor(),

        ];
    }

}
