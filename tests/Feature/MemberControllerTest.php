<?php

namespace Tests\Feature;

use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_member_can_be_created_viewed_and_updated(): void
    {
        $this->post(route('members.store'), [
            'nim' => 'NIM001',
            'nama' => 'Sari Anggota',
            'email' => 'sari@example.test',
            'nomor_telepon' => '08123456789',
            'status' => 'aktif',
            'alamat' => 'Bandung',
        ])->assertRedirect(route('members.index'));

        $member = Member::where('nim', 'NIM001')->firstOrFail();

        $this->get(route('members.show', $member))
            ->assertOk()
            ->assertSee('Sari Anggota');
        $this->get(route('members.edit', $member))->assertOk();

        $this->put(route('members.update', $member), [
            'nim' => 'NIM001',
            'nama' => 'Sari Updated',
            'email' => 'sari@example.test',
            'nomor_telepon' => '08123456789',
            'status' => 'nonaktif',
            'alamat' => 'Jakarta',
        ])->assertRedirect(route('members.index'));

        $this->assertDatabaseHas('members', [
            'id' => $member->id,
            'nama' => 'Sari Updated',
            'status' => 'nonaktif',
        ]);
    }

    public function test_member_search_matches_name_or_nim(): void
    {
        Member::create([
            'nim' => 'ABC123',
            'nama' => 'Dewi Anggota',
            'email' => 'dewi@example.test',
            'nomor_telepon' => '08123456789',
            'status' => 'aktif',
        ]);
        Member::create([
            'nim' => 'XYZ789',
            'nama' => 'Rina Anggota',
            'email' => 'rina@example.test',
            'nomor_telepon' => '08123456780',
            'status' => 'aktif',
        ]);

        $this->get(route('members.index', ['search' => 'ABC']))
            ->assertOk()
            ->assertSee('Dewi Anggota')
            ->assertDontSee('Rina Anggota');

        $this->get(route('members.index', ['search' => 'Rina']))
            ->assertOk()
            ->assertSee('Rina Anggota')
            ->assertDontSee('Dewi Anggota');
    }
}