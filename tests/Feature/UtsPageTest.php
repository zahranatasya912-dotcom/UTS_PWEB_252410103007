<?php

namespace Tests\Feature;

use Tests\TestCase;

class UtsPageTest extends TestCase
{
    /**
     * Test redirect root ke login
     */
    public function test_root_redirects_to_login(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
    }

    /**
     * Test halaman login dapat diakses
     */
    public function test_login_page_renders_successfully(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Form Login');
        $response->assertSee('Username');
    }

    /**
     * Test form login memproses data dan meneruskan username ke dashboard
     */
    public function test_login_process_redirects_to_dashboard_with_username(): void
    {
        $response = $this->post('/login', [
            'username' => 'Natasya Zulaikha',
            'password' => '12345',
        ]);

        $response->assertRedirect(route('dashboard', [
            'username' => 'Natasya Zulaikha',
        ]));
    }

    /**
     * Test halaman dashboard dapat diakses dan menerima username dari request parameter
     */
    public function test_dashboard_renders_with_username(): void
    {
        $response = $this->get('/dashboard?username=Natasya+Zulaikha');
        $response->assertStatus(200);
        $response->assertSee('Selamat Datang, Natasya Zulaikha!');
        $response->assertSee('Total Jenis Barang');
    }

    /**
     * Test halaman pengelolaan menampilkan array data secara dinamis
     */
    public function test_pengelolaan_renders_array_data(): void
    {
        $response = $this->get('/pengelolaan?username=Natasya+Zulaikha');
        $response->assertStatus(200);
        $response->assertSee('Pengelolaan Data Barang');
        $response->assertSee('Laptop ASUS ROG');
        $response->assertSee('BRG-01');
    }

    /**
     * Test halaman profile menerima username dari request parameter
     */
    public function test_profile_renders_with_username(): void
    {
        $response = $this->get('/profile?username=Natasya+Zulaikha');
        $response->assertStatus(200);
        $response->assertSee('Natasya Zulaikha');
        $response->assertSee('NATASYA ZULAIKHA ZAHRA');
        $response->assertSee('252410103007');
    }
}
