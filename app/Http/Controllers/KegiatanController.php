<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = DB::table('kegiatans')->get();

        return view('admin.index', compact('kegiatans'));
        // return response()->json($kegiatans);
    }

    public function search(Request $request)
    {
        // Ambil kata kunci pencarian dari input form
        $keyword = $request->input('keyword');

        // Lakukan pencarian kegiatan berdasarkan kata kunci menggunakan Query Builder
        $kegiatans = DB::table('kegiatans')
            ->where('title', 'like', "%$keyword%")
            ->get();

        // Kirim data hasil pencarian ke view
        return view('admin.index', compact('kegiatans'));

        // echo('halo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        // Menyimpan foto jika ada
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photo->move(public_path('image'), $photoName);
        }

        $date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d H:i:s');

        // Menyimpan data kegiatan ke dalam database menggunakan Query Builder
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'date' => $date,
            'photo' => $photoName, // null jika tidak ada foto yang diunggah
            'created_at' => now(), // Waktu pembuatan akan diatur otomatis
            'updated_at' => now(), // Waktu pembaruan akan diatur otomatis
        ];

        DB::table('kegiatans')->insert($data);

        // Redirect ke halaman yang sesuai
        return redirect()->route('home')->with('success', 'Kegiatan berhasil ditambahkan.');

        // return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        // Mengambil data kegiatan berdasarkan ID menggunakan Query Builder
        $kegiatan = DB::table('kegiatans')->where('id', $id)->first();

        // Periksa apakah kegiatan ditemukan
        if (!$kegiatan) {
            abort(404); // Jika tidak ditemukan, tampilkan halaman 404
        }

        // Mengembalikan view edit beserta data kegiatan yang akan diedit
        return view('admin.edit', ['kegiatan' => $kegiatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        // Mengambil data kegiatan berdasarkan ID
        $kegiatan = DB::table('kegiatans')->where('id', $id)->first();

        // Periksa apakah kegiatan ditemukan
        if (!$kegiatan) {
            abort(404); // Jika tidak ditemukan, tampilkan halaman 404
        }

        // Menyimpan foto jika ada
        $photoName = $kegiatan->photo; // Simpan nama foto saat ini sebagai default
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $photo->move(public_path('image'), $photoName);
        }

        // Memformat tanggal jika ada dalam input
        $date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d H:i:s');

        // Memperbarui data kegiatan dalam database menggunakan Query Builder
        DB::table('kegiatans')
        ->where('id', $id)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $date, // Update tanggal dengan format yang benar
            'photo' => $photoName, // Update nama foto jika diunggah
            'updated_at' => now(), // Waktu pembaruan akan diatur otomatis
        ]);

        // Redirect ke halaman yang sesuai
        return redirect()->route('home')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        // Dapatkan informasi kegiatan yang akan dihapus
        $kegiatan = DB::table('kegiatans')->where('id', $id)->first();

        // Jika ada foto terkait, hapus foto dari direktori
        if (!is_null($kegiatan->photo)) {
            $photoPath = public_path('image') . '/' . $kegiatan->photo;
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        // Hapus entri kegiatan dari database
        DB::table('kegiatans')->where('id', $id)->delete();

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('home')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
