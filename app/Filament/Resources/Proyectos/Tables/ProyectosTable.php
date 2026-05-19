<?php

namespace App\Filament\Resources\Proyectos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProyectosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen_url')
                    ->label('Foto')
                    ->square()
                    ->defaultImageUrl('https://placehold.co/80x80/1a1a1a/c9a84c?text=?'),

                TextColumn::make('nombre')
                    ->label('Proyecto')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->badge()
                    ->sortable(),

                TextColumn::make('fecha')
                    ->label('Año')
                    ->date('Y')
                    ->sortable(),

                IconColumn::make('destacado')
                    ->label('Destacado')
                    ->boolean()
                    ->trueColor('warning')
                    ->falseColor('gray'),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('fecha', 'desc')
            ->filters([
                SelectFilter::make('categoria')
                    ->relationship('categoria', 'nombre')
                    ->label('Filtrar por categoría'),

                TernaryFilter::make('destacado')
                    ->label('Destacados'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
