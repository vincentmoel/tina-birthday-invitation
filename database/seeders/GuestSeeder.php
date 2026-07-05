<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        $guests = [
            ['name' => 'Cik Rita dan Koh Hendro', 'phone' => '081931931279'],
            ['name' => 'Cik Susan dan Koh David', 'phone' => '08112991889'],
            ['name' => 'Koh Yahya dan Cik Djeng', 'phone' => '08157691335'],
            ['name' => 'Cik Kezia Christina dan Koh Rudy', 'phone' => '08112577735'],
            ['name' => 'Cik Dewi dan Koh Thomas', 'phone' => '081327570506'],
            ['name' => 'Cik Liana dan Koh Dedy', 'phone' => '08966131825'],
            ['name' => 'Nindita', 'phone' => '08156502234'],
            ['name' => 'Cik Siany', 'phone' => '087834594416'],
            ['name' => 'Tante Mimin', 'phone' => '08156617019'],
            ['name' => 'Tante Maria', 'phone' => '08164885331'],
            ['name' => 'Cik Jenny dan Koh Lukas', 'phone' => '0816669702'],
            ['name' => 'Koh QQ', 'phone' => '0816232125'],
            ['name' => 'Cik Junita', 'phone' => '087737741509'],
            ['name' => 'Cik Vivi', 'phone' => '089528957782'],
            ['name' => 'Yustina', 'phone' => '087727535964'],
            ['name' => 'Yoshua', 'phone' => '085742608904'],
            ['name' => 'Cik Vivi dan Koh Markus', 'phone' => '089665425245'],
            ['name' => 'Koh Agus Prajitno dan Cik Lianawati', 'phone' => '0816651047'],
            ['name' => 'Landiana dan Erwin', 'phone' => '082134001047'],
            ['name' => 'Landiani', 'phone' => '08777561019'],
            ['name' => 'Lina Anita', 'phone' => '089671226194'],
            ['name' => 'Dhani', 'phone' => '08562700909'],
            ['name' => 'Deasy', 'phone' => '082133853880'],
            ['name' => 'Feliciana Worang', 'phone' => '08112781802'],
            ['name' => 'Haris', 'phone' => '082299038309'],
            ['name' => 'Cik Ana', 'phone' => '082138883867'],
            ['name' => 'Dina', 'phone' => '088802401251'],
            ['name' => 'Mija', 'phone' => '081381262538'],
            ['name' => 'Henry', 'phone' => '081901830583'],
            ['name' => 'Anik', 'phone' => '08522611936'],
            ['name' => 'Okki', 'phone' => '08122815524'],
            ['name' => 'Tanti', 'phone' => '087846846380'],
            ['name' => 'Adrian', 'phone' => '087824961844'],
            ['name' => 'Risa dan Lukas', 'phone' => '082242046746'],
            ['name' => 'Daniel', 'phone' => '081805965368'],
            ['name' => 'Grace', 'phone' => '082242765236'],
            ['name' => 'Hizkia dan Sasha', 'phone' => '082136901304'],
            ['name' => 'Ivan', 'phone' => '081804059606'],
            ['name' => 'Jojo', 'phone' => '087832655686'],
            ['name' => 'Belgia dan Vivi', 'phone' => '089666201172'],
            ['name' => 'Laurent', 'phone' => '089519830097'],
            ['name' => 'Marcel', 'phone' => '0895360562444'],
            ['name' => 'Maurent', 'phone' => '0895323059788'],
            ['name' => 'Mozes', 'phone' => '089682266831'],
            ['name' => 'Reza dan Rosa', 'phone' => '087877687627'],
            ['name' => 'Okky', 'phone' => '089667700006'],
            ['name' => 'One', 'phone' => '085765549879'],
            ['name' => 'Rudy dan Ruth', 'phone' => '081805820979'],
            ['name' => 'Wellyam', 'phone' => '08995674015'],
            ['name' => 'Dio dan Lisa', 'phone' => '0811196914'],
            ['name' => 'Victor', 'phone' => '089669036654'],
            ['name' => 'Vincent', 'phone' => '085156591059'],
            ['name' => 'Virgan', 'phone' => '082171675415'],
            ['name' => 'Willy', 'phone' => '081333859785'],
            ['name' => 'Ryan', 'phone' => '082134858539'],
        ];

        foreach ($guests as $guest) {
            Guest::updateOrCreate(
                ['name' => $guest['name']],
                ['phone' => $guest['phone']]
            );
        }
    }
}
