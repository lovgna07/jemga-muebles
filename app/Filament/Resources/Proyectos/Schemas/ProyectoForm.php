<?php

namespace App\Filament\Resources\Proyectos\Schemas;

use App\Models\Categoria;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProyectoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información del Proyecto')
                    ->columns(2)
                    ->schema([
                        Select::make('categoria_id')
                            ->label('Categoría')
                            ->options(Categoria::pluck('nombre', 'id'))
                            ->required()
                            ->searchable(),

                        DatePicker::make('fecha')
                            ->label('Fecha del proyecto')
                            ->required()
                            ->displayFormat('d/m/Y'),

                        TextInput::make('nombre')
                            ->label('Nombre del proyecto')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) =>
                                $set('slug', Str::slug($state ?? ''))
                            )
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Toggle::make('destacado')
                            ->label('Proyecto destacado (aparece en el inicio)')
                            ->columnSpanFull(),
                    ]),

                Section::make('Imágenes')
                    ->description('La imagen principal es obligatoria. La galería es opcional.')
                    ->schema([
                        FileUpload::make('imagen')
                            ->label('Imagen principal')
                            ->image()
                            ->imageEditor()
                            ->directory('proyectos')
                            ->visibility('public')
                            ->required()
                            ->maxSize(4096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),

                        FileUpload::make('imagen_galeria')
                            ->label('Galería de imágenes (opcional)')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->directory('proyectos/galeria')
                            ->visibility('public')
                            ->maxSize(4096)
                            ->maxFiles(10)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    ]),

            ]);
    }
}
