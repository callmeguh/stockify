<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Menampilkan daftar supplier untuk manager (read-only)
     */
    public function index()
    {
        // Pagination agar lebih rapi, 10 data per halaman
        $suppliers = Supplier::paginate(10);

        // Kembalikan ke view manager
        return view('layouts.manager.suppliers.index', compact('suppliers'));
    }

    /**
     * (Opsional) Menampilkan detail supplier
     */
    public function show(Supplier $supplier)
    {
        return view('layouts.manager.suppliers.show', compact('supplier'));
    }
}
