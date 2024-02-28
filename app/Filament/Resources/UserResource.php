<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getNavigationGroup(): ?string
    {
        return __('filament-shield::filament-shield.nav.group');
    }
    protected static ?string $slug = 'usuarios';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'Usuário';

    protected static ?string $pluralModelLabel = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getMainForm(),
                static::getRegisterForm(),
                static::getPasswordForm(),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),
                TextColumn::make('roles.name')

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }


    public static function getMainForm() : Section
    {
        return Forms\Components\Section::make()
                ->schema(
                    [
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('user_name')
                            ->label('Usuário')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->rules(['email'])
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\Select::make('roles')
                            ->label('Furções')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                    ])
                ->columns(2)
                ->columnSpan(['lg' => fn (?User $record) => $record === null ? 3 : 2]);
    }

    public static function getRegisterForm(): Section
    {
        return Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Criado em')
                        ->content(fn (User $record): ?string => $record->created_at?->diffForHumans()),

                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Ùltima Modificação')
                        ->content(fn (User $record): ?string => $record->updated_at?->diffForHumans()),
                ])
                ->columnSpan(['lg' => 1])
                ->hidden(fn (?User $record) => $record === null);
    }

    public static function getPasswordForm() : Section
    {
        return Forms\Components\Section::make()
            ->schema(
                [
                    Forms\Components\TextInput::make('password')
                    ->label('Senha')
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->password()
                    ->confirmed()
                    ->rule(Password::default()),

                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Confirmação de Senha')
                    ->dehydrated(false)
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->maxLength(255),
                ])
            ->columns(2)
            ->visibleOn(['create','edit'])
            ->columnSpan(['lg' => fn (?User $record) => $record === null ? 3 : 2]);
            // ->visible( fn ($livewire) => ( $livewire instanceof CreateUser | $livewire instanceof EditUser ) )
    }
}
