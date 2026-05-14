<?php



namespace App\Filament\Resources\FooterSettings\Tables;



use Filament\Actions\BulkActionGroup;

use Filament\Actions\DeleteBulkAction;

use Filament\Actions\EditAction;

use Filament\Tables\Columns\ImageColumn;

use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Table;



class FooterSettingsTable

{

    public static function configure(Table $table): Table

    {

        return $table

            ->columns([

                ImageColumn::make('logo')

                    ->label('Brand Logo')

                    ->defaultImageUrl(url('/img/logo.png')) // Fallback if empty

                    ->circular(),



                TextColumn::make('tagline')

                    ->label('Tagline')

                    ->limit(40)

                    ->searchable(),



                TextColumn::make('updated_at')

                    ->label('Last Updated')

                    ->dateTime()

                    ->sortable()

                    ->toggleable(isToggledHiddenByDefault: false),

            ])

            ->filters([

                // Filters are generally not needed for a single settings row

            ])

            ->actions([

                EditAction::make(),

            ])

            ->bulkActions([

                BulkActionGroup::make([

                    DeleteBulkAction::make(),

                ]),

            ]);

    }

}