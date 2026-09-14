<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * Test Rute 1: Home (GET /)
     */
    public function test_home_route_returns_ok_and_renders_view(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewIs('home');
        $response->assertSee('Fayza Lathifah Humam');
        $response->assertSee('5025241094');
        $response->assertSee('Teknik Informatika');
    }

    /**
     * Test Rute 2: Detail Profil Mahasiswa (GET /dashboard/mahasiswa/{nrp}) dengan regex 10 digit
     */
    public function test_mahasiswa_route_with_valid_10_digits_nrp(): void
    {
        $response = $this->get(route('mahasiswa.profil', ['nrp' => '5025241094']));

        $response->assertStatus(200);
        $response->assertViewIs('mahasiswa');
        $response->assertSee('5025241094');
        $response->assertSee('Fayza Lathifah Humam');
        $response->assertSee('Framework-Based Programming');
        $response->assertSee('Information Security');
    }

    /**
     * Test Rute 2: Regex constraint menolak NRP kurang dari 10 digit (404 fallback)
     */
    public function test_mahasiswa_route_with_invalid_length_nrp_returns_404(): void
    {
        $response = $this->get('/dashboard/mahasiswa/12345');
        $response->assertStatus(404);
        $response->assertViewIs('errors.fallback');
    }

    /**
     * Test Rute 2: Regex constraint menolak karakter non-numerik (404 fallback)
     */
    public function test_mahasiswa_route_with_non_numeric_nrp_returns_404(): void
    {
        $response = $this->get('/dashboard/mahasiswa/abcdefghij');
        $response->assertStatus(404);
        $response->assertViewIs('errors.fallback');
    }

    /**
     * Test Rute 3: Ide Platform AI tanpa parameter (default fallback)
     */
    public function test_agent_route_without_param_uses_default_theme(): void
    {
        $response = $this->get(route('agent.ide'));

        $response->assertStatus(200);
        $response->assertViewIs('agent');
        $response->assertSee('General Assistant Agent');
    }

    /**
     * Test Rute 3: Ide Platform AI dengan parameter security
     */
    public function test_agent_route_with_security_theme(): void
    {
        $response = $this->get(route('agent.ide', ['tema' => 'security']));

        $response->assertStatus(200);
        $response->assertViewIs('agent');
        $response->assertSee('Agentic Network Security');
        $response->assertSee('Understand');
        $response->assertSee('Report');
        $response->assertSee('Context Resolver');
    }

    /**
     * Test Rute 4: Kalkulator IPK Otomatis dengan desimal valid
     */
    public function test_kalkulator_ipk_calculates_total_and_average(): void
    {
        $response = $this->get(route('ipk.hitung', ['ipk1' => '3.80', 'ipk2' => '3.90']));

        $response->assertStatus(200);
        $response->assertViewIs('ipk');
        $response->assertSee('7.70');
        $response->assertSee('3.85');
    }

    /**
     * Test Rute 4: Tantangan A+ #3 (Validasi rentang wajar > 4.00)
     */
    public function test_kalkulator_ipk_out_of_range_shows_warning(): void
    {
        $response = $this->get(route('ipk.hitung', ['ipk1' => '4.50', 'ipk2' => '3.00']));

        $response->assertStatus(200);
        $response->assertSee('Peringatan: Nilai IPK berada di luar rentang standar akademik');
    }

    /**
     * Test Tantangan A+ #1: Rute Profil Akademis Otomatis Diawali /dashboard/...
     */
    public function test_dashboard_route_grouping_prefixes(): void
    {
        // URL otomatis diawali /dashboard/...
        $this->assertEquals(url('/dashboard/mahasiswa/5025241094'), route('mahasiswa.profil', ['nrp' => '5025241094']));
        $this->assertEquals(url('/dashboard/agent'), route('agent.ide'));
        $this->assertEquals(url('/dashboard/hitung-ipk/3.5/3.5'), route('ipk.hitung', ['ipk1' => '3.5', 'ipk2' => '3.5']));

        $responseMhs = $this->get('/dashboard/mahasiswa/5025241094');
        $responseMhs->assertStatus(200);
        $responseMhs->assertSee('5025241094');

        $responseAgent = $this->get('/dashboard/agent');
        $responseAgent->assertStatus(200);
        $responseAgent->assertSee('General Assistant Agent');

        $responseIpk = $this->get('/dashboard/hitung-ipk/3.5/3.5');
        $responseIpk->assertStatus(200);
        $responseIpk->assertSee('3.50');
    }

    /**
     * Test Fallback Route: Halaman tidak terdaftar menghasilkan 404 view fallback
     */
    public function test_fallback_route_renders_custom_404_view(): void
    {
        $response = $this->get('/halaman-yang-pasti-tidak-ada-12345');

        $response->assertStatus(404);
        $response->assertViewIs('errors.fallback');
        $response->assertSee('404');
        $response->assertSee('Halaman Tidak');
    }
}
