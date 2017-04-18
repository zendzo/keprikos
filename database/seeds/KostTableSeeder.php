<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Kost;

class KostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $nameKost = ['Melati','Mawar','Kamboja','Anggrek','Bayan','Kantil'];

        $address = ['Jalan Adi Sucipto','Jalan Ahmad Yani','Jalan Asia Afrika','Jalan Basuki Rahmat','Jalan Bintan','Jalan Brigjen Katamso','Jalan Cut Nyak Dhien','Jalan DI Panjaitan','Jalan Gambir','Jalan Gereja','Jalan Haji Agus Salim','Jalan Hang Lekir','Jalan Hang Tuah','Jalan Hanjoyo Putro','Jalan Ikroq','Jalan Ir. Sutami'];

        $geoName = ['Batam','Bintan','Karimun','Anambas','Lingga','Natuna'];

        $roomSize = ['3x3','4x4','5x5'];

        $roomFacility = ['Bed','Almari Pakaian','TV','AC','Meja Belajar','Wifi','Kursi Belajar'];

        $bathRoomFacility = ['Kloset Duduk','Air Panas','Shower','Kamar Mandi Dalam'];

        $generalFacility = ['Dapur','Security','Laundry'];

        $nearByFacility = ['Warung Makan','Mini Market','ATM','Kampus','Apotek','Halte','Pusat Belanja'];
        $statusAgent = ['Pemilik','Angent'];

        $coverPhoto = ['cover-1.jpg','cover-2.jpg','cover-3.jpg','cover-4.jpg'];
		$buildingPhoto = ['building-1.jpg','building-2.jpg','building-3.jpg'];
		$roomFrontPhoto = ['roomfront-1.jpg','roomfront-2.jpg','roomfront-3.jpg'];
		$roomInsidePhoto = ['roominside-2.jpg','roominside-3.jpg','roominside-4.jpg','roominside-5.jpg','roominside-6.jpg','roominside-7.jpg'];
		$toiletFrontPhoto = ['toiletfront-1.jpg','toiletfront-2.jpg'];
		$toiletInsidePhoto = ['toiletinside-1.jpg','toiletinside-2.jpg','toiletinside-3.jpg','toiletinside-4.jpg',];
		$otherFacilityPhoto = 'otherfacility-1.jpg';

		$photoLocation = "/assets/img/kost/kost-1/";

        for ($i=0; $i < 50; $i++) {

        	Model::unguard();

        	$kost = new Kost;

        		$kost->name	=	$nameKost[rand(0,5)];
				$kost->address	=	$address[rand(0,15)];
				$kost->owner		= $faker->name;
				$kost->ownerPhone	= $faker->e164PhoneNumber;
				$kost->manager		= $faker->name;
				$kost->managerPhone	= $faker->e164PhoneNumber;
				$kost->phone		= $faker->e164PhoneNumber;
				$kost->geoName		= $geoName[rand(0,5)];
				$kost->latitude		= $faker->latitude($min = -90, $max = 90);
				$kost->longitude		= $faker->longitude($min = -180, $max = 180);
				$kost->subdistrict	= $geoName[rand(0,5)];
				$kost->city			= $geoName[rand(0,5)];
				$kost->priceDaily	= rand(10000,100000);
				$kost->priceWeekly	= rand(50000,500000);
				$kost->priceMonthly	= rand(500000,1000000);
				$kost->priceYearly	= rand(1000000,5000000);
				$kost->minPay		= rand(100000,500000);
				$kost->priceRemark	= "test";
				$kost->roomCount	= rand(1,10);
				$kost->size			= $roomSize[rand(0,2)];
				$kost->gender		= rand(1,3);
				$kost->status		= rand(0,1);
				$kost->roomAvailable	= rand(1,10);
				$kost->animal		= rand(0,1);
				$kost->roomFacility	= $roomFacility[rand(0,6)];
				$kost->otherRoomFacility = $faker->word;
				$kost->bathRoomFacility = $bathRoomFacility[rand(0,3)];
				$kost->otherBathRoomFacility = $faker->word;
				$kost->parking	= rand(1,3);
				$kost->generalFacility = $generalFacility[rand(0,2)];
				$kost->otherGeneralFacility = $faker->word;
				$kost->nearByFacility	= $nearByFacility[rand(0,6)];
				$kost->otherNearByFacility = $faker->word;
				$kost->remarks	= $faker->word;
				$kost->descriptions	= $faker->text($maxNbChars = 50);
				$kost->nameAgent = $faker->name;
				$kost->emailAgent = $faker->safeEmail;
				$kost->hpAgent	= $faker->e164PhoneNumber;
				$kost->statusAgent = $statusAgent[rand(0,1)];
				$kost->coverPhoto = $photoLocation.$coverPhoto[rand(0,3)];
				$kost->buildingPhoto = $photoLocation.$buildingPhoto[rand(0,2)];
				$kost->roomFrontPhoto = $photoLocation.$roomFrontPhoto[rand(0,2)];
				$kost->roomInsidePhoto = $photoLocation.$roomInsidePhoto[rand(0,5)];
				$kost->toiletFrontPhoto = $photoLocation.$toiletFrontPhoto[rand(0,1)];
				$kost->toiletInsidePhoto = $photoLocation.$toiletInsidePhoto[rand(0,3)];
				$kost->otherFacilityPhoto = $photoLocation.$otherFacilityPhoto;
				$kost->user_id = rand(1,10);
				$kost->save();
        }

        $this->command->info('Menambahkan 50 items ke Table Kosts');
    }
}
