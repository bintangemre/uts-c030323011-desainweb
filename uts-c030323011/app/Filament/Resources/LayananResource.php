<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayananResource\Pages;
use App\Filament\Resources\LayananResource\RelationManagers;
use App\Models\Layanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LayananResource extends Resource
{
    protected static ?string $model = Layanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pemohon')
                    ->label('Nama Pemohon')
                    ->required(),

                Forms\Components\Select::make('jenis_layanan')
                    ->label('Jenis Layanan')
                    ->options([
                        'Layanan Membuat SKTM' => 'Layanan Membuat SKTM',
                        'Layanan Membuat KTP' => 'Layanan Membuat KTP',
                        'Layanan Pencari Pegawai' => 'Layanan Pencari Pegawai',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_ajuan')
                    ->label('Tanggal Ajuan')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'Pending' => 'Pending',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pemohon')->label('Nama Pemohon'),
                Tables\Columns\TextColumn::make('jenis_layanan')->label('Jenis Layanan'),
                Tables\Columns\TextColumn::make('tanggal_ajuan')->label('Tanggal Ajuan')->date(),
                Tables\Columns\TextColumn::make('status')->label('Status'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }
}
