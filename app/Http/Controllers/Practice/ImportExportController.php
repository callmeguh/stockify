<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ImportExportController extends Controller
{
    // Halaman utama import/export
    public function index()
    {
        return view('pages.import_export.index');
    }

    // Import CSV
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('file');

        if (($handle = fopen($file, 'r')) !== false) {
            fgetcsv($handle); // skip header
            while (($row = fgetcsv($handle)) !== false) {
                Product::updateOrCreate(
                    ['id' => $row[0]], // jika ingin update berdasarkan ID
                    ['name' => $row[1], 'price' => $row[2]]
                );
            }
            fclose($handle);
        }

        return back()->with('success', 'Data berhasil diimport!');
    }

    // Export CSV
    public function export()
    {
        $products = Product::all();
        $filename = 'products.csv';
        $handle = fopen($filename, 'w');

        // Header CSV
        fputcsv($handle, ['ID', 'Nama Produk', 'Harga']);

        foreach ($products as $product) {
            fputcsv($handle, [$product->id, $product->name, $product->price]);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
