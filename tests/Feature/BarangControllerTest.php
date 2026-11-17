<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BarangControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_barang_dengan_kondisi_baik_disimpan_dan_ditampilkan_sebagai_baik(): void
    {
        $response = $this->post(route('barang.store'), [
            'kode_barang' => 'INV-001',
            'nama_barang' => 'Laptop',
            'kategori' => 'Elektronik',
            'kondisi' => 'baik',
            'jumlah' => 1,
            'lokasi' => 'Lab Komputer',
            'tanggal_masuk' => '2026-11-17',
        ]);

        $response->assertRedirect(route('barang.index'));
        $this->assertDatabaseHas('barangs', [
            'kode_barang' => 'INV-001',
            'kondisi' => 'baik',
        ]);

        $indexResponse = $this->get(route('barang.index'));

        $indexResponse->assertOk()
            ->assertSee('badge badge-success">Baik</span>', false);
    }
}
