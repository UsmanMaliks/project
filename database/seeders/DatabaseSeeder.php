<?php

namespace Database\Seeders;

use App\Models\city;
use App\Models\Package;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name'=>'Superadmin']);
        $permission1 = Permission::create(['name'=>'User Management']);
        $permission2 = Permission::create(['name'=>'Tour Management']);
        $permission3 = Permission::create(['name'=>'Package Management']);
        $permission4 = Permission::create(['name'=>'City Table']);
        $permission5 = Permission::create(['name'=>'All Tour Table']);
        $permission6 = Permission::create(['name'=>'Agency Tour Table']);
        $permission7 = Permission::create(['name'=>'Booked Trips']);
        $permission8 = Permission::create(['name'=>'Feedback Table']);

        $role->givePermissionTo($permission1);
        $role->givePermissionTo($permission2);
        $role->givePermissionTo($permission3);
        $role->givePermissionTo($permission4);
        $role->givePermissionTo($permission5);
        $role->givePermissionTo($permission6);
        $role->givePermissionTo($permission7);
        $role->givePermissionTo($permission8);


        $password = bcrypt('123456789');
        $Admin = [
            'name' => 'Malik Usman',
            'email' => 'admin@gmail.com',
            'password' => $password,
            'type' => 'Admin',
            'is_active' => 1
        ];


        User::create($Admin);
        $adminrole = User::find(1);
        $adminrole->assignRole('Superadmin');

        $role1 = Role::create(['name'=>'Customer']);
        $role1->givePermissionTo($permission4);
        //Agency
        $role2 = Role::create(['name'=>'Agency']);
        $role2->givePermissionTo($permission2);
        $role2->givePermissionTo($permission4);
        $role2->givePermissionTo($permission6);

        $role3 = Role::create(['name'=>'Manager']);

        $password = bcrypt('123456789');
        $agency = [
            'name' => 'Dunia Travels',
            'email' => 'agency@gmail.com',
            'password' => $password,
            'type' => 'Agency',
            'is_active' => 1
        ];


        $agencyrole = User::create($agency);
        $agencyrole->assignRole('Agency');

        $package1 = [
            'name' => 'Basic Package',
            'price_stripe_id' => 'price_1KdEZvGMq2LaeuYkWlRnpO7o'
        ];
        $package2 = [
            'name' => 'VIP Package',
            'price_stripe_id' => 'price_1KdEZvGMq2LaeuYkjtvd9GJh'
        ];
        $package3 = [
            'name' => 'Premium Package',
            'price_stripe_id' => 'price_1KdEZvGMq2LaeuYkWlRnpO7o'
        ];

        $package = array(
             'package1' => $package1,
             'package2' => $package2,
             'package3' => $package3
        );


        for ($i=1; $i <= 3; $i++) {

            Package::create($package['package'.$i]);
        }

        $cities = array (
            0 =>
            array (
              'name' => 'Karachi',
              'latitude' => '24.86',
              'longitude' => '67.01',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '14835000',
            ),
            1 =>
            array (
              'name' => 'Lahore',
              'latitude' => '31.5497',
              'longitude' => '74.3436',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '11021000',
            ),
            2 =>
            array (
              'name' => 'Faisalabad',
              'latitude' => '31.418',
              'longitude' => '73.079',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '3203846',
            ),
            3 =>
            array (
              'name' => 'Rawalpindi',
              'latitude' => '33.6007',
              'longitude' => '73.0679',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '2098231',
            ),
            4 =>
            array (
              'name' => 'Gujranwala',
              'latitude' => '32.15',
              'longitude' => '74.1833',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '2027001',
            ),
            5 =>
            array (
              'name' => 'Peshawar',
              'latitude' => '34',
              'longitude' => '71.5',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '1970042',
            ),
            6 =>
            array (
              'name' => 'Multan',
              'latitude' => '30.1978',
              'longitude' => '71.4711',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '1871843',
            ),
            7 =>
            array (
              'name' => 'Saidu Sharif',
              'latitude' => '34.75',
              'longitude' => '72.3572',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '1860310',
            ),
            8 =>
            array (
              'name' => 'Hyderabad City',
              'latitude' => '25.3792',
              'longitude' => '68.3683',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '1732693',
            ),
            9 =>
            array (
              'name' => 'Islamabad',
              'latitude' => '33.6989',
              'longitude' => '73.0369',
              'country' => 'Pakistan',
              'province' => 'Islāmābād',
              'population' => '1014825',
            ),
            10 =>
            array (
              'name' => 'Quetta',
              'latitude' => '30.192',
              'longitude' => '67.007',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => '1001205',
            ),
            11 =>
            array (
              'name' => 'Bahawalpur',
              'latitude' => '29.3956',
              'longitude' => '71.6722',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '762111',
            ),
            12 =>
            array (
              'name' => 'Sargodha',
              'latitude' => '32.0836',
              'longitude' => '72.6711',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '659862',
            ),
            13 =>
            array (
              'name' => 'Sialkot City',
              'latitude' => '32.5',
              'longitude' => '74.5333',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '655852',
            ),
            14 =>
            array (
              'name' => 'Sukkur',
              'latitude' => '27.6995',
              'longitude' => '68.8673',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '499900',
            ),
            15 =>
            array (
              'name' => 'Larkana',
              'latitude' => '27.56',
              'longitude' => '68.2264',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '490508',
            ),
            16 =>
            array (
              'name' => 'Chiniot',
              'latitude' => '31.7167',
              'longitude' => '72.9833',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '477781',
            ),
            17 =>
            array (
              'name' => 'Shekhupura',
              'latitude' => '31.7083',
              'longitude' => '74',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '473129',
            ),
            18 =>
            array (
              'name' => 'Jhang City',
              'latitude' => '31.2681',
              'longitude' => '72.3181',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '414131',
            ),
            19 =>
            array (
              'name' => 'Dera Ghazi Khan',
              'latitude' => '30.05',
              'longitude' => '70.6333',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '399064',
            ),
            20 =>
            array (
              'name' => 'Gujrat',
              'latitude' => '32.5736',
              'longitude' => '74.0789',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '390533',
            ),
            21 =>
            array (
              'name' => 'Rahimyar Khan',
              'latitude' => '28.4202',
              'longitude' => '70.2952',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '353203',
            ),
            22 =>
            array (
              'name' => 'Kasur',
              'latitude' => '31.1167',
              'longitude' => '74.45',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '314617',
            ),
            23 =>
            array (
              'name' => 'Mardan',
              'latitude' => '34.1958',
              'longitude' => '72.0447',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '300424',
            ),
            24 =>
            array (
              'name' => 'Mingaora',
              'latitude' => '34.7717',
              'longitude' => '72.36',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '279914',
            ),
            25 =>
            array (
              'name' => 'Nawabshah',
              'latitude' => '26.2442',
              'longitude' => '68.41',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '263102',
            ),
            26 =>
            array (
              'name' => 'Sahiwal',
              'latitude' => '30.6706',
              'longitude' => '73.1064',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '247706',
            ),
            27 =>
            array (
              'name' => 'Mirpur Khas',
              'latitude' => '25.5269',
              'longitude' => '69.0111',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '236961',
            ),
            28 =>
            array (
              'name' => 'Okara',
              'latitude' => '30.81',
              'longitude' => '73.4597',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '232386',
            ),
            29 =>
            array (
              'name' => 'Mandi Burewala',
              'latitude' => '30.15',
              'longitude' => '72.6833',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '203454',
            ),
            30 =>
            array (
              'name' => 'Jacobabad',
              'latitude' => '28.2769',
              'longitude' => '68.4514',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '200815',
            ),
            31 =>
            array (
              'name' => 'Saddiqabad',
              'latitude' => '28.3006',
              'longitude' => '70.1302',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '189876',
            ),
            32 =>
            array (
              'name' => 'Kohat',
              'latitude' => '33.5869',
              'longitude' => '71.4414',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '170800',
            ),
            33 =>
            array (
              'name' => 'Muridke',
              'latitude' => '31.802',
              'longitude' => '74.255',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '163268',
            ),
            34 =>
            array (
              'name' => 'Muzaffargarh',
              'latitude' => '30.0703',
              'longitude' => '71.1933',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '163268',
            ),
            35 =>
            array (
              'name' => 'Khanpur',
              'latitude' => '28.6471',
              'longitude' => '70.662',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '160308',
            ),
            36 =>
            array (
              'name' => 'Gojra',
              'latitude' => '31.15',
              'longitude' => '72.6833',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '157863',
            ),
            37 =>
            array (
              'name' => 'Mandi Bahauddin',
              'latitude' => '32.5861',
              'longitude' => '73.4917',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '157352',
            ),
            38 =>
            array (
              'name' => 'Abbottabad',
              'latitude' => '34.15',
              'longitude' => '73.2167',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '148587',
            ),
            39 =>
            array (
              'name' => 'Turbat',
              'latitude' => '26.0031',
              'longitude' => '63.0544',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => '147791',
            ),
            40 =>
            array (
              'name' => 'Dadu',
              'latitude' => '26.7319',
              'longitude' => '67.775',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '146179',
            ),
            41 =>
            array (
              'name' => 'Bahawalnagar',
              'latitude' => '29.9944',
              'longitude' => '73.2536',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '141935',
            ),
            42 =>
            array (
              'name' => 'Khuzdar',
              'latitude' => '27.8',
              'longitude' => '66.6167',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => '141395',
            ),
            43 =>
            array (
              'name' => 'Pakpattan',
              'latitude' => '30.35',
              'longitude' => '73.4',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '139525',
            ),
            44 =>
            array (
              'name' => 'Tando Allahyar',
              'latitude' => '25.4667',
              'longitude' => '68.7167',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '133487',
            ),
            45 =>
            array (
              'name' => 'Ahmadpur East',
              'latitude' => '29.1453',
              'longitude' => '71.2617',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '128112',
            ),
            46 =>
            array (
              'name' => 'Vihari',
              'latitude' => '30.0419',
              'longitude' => '72.3528',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '128034',
            ),
            47 =>
            array (
              'name' => 'Jaranwala',
              'latitude' => '31.3342',
              'longitude' => '73.4194',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '127973',
            ),
            48 =>
            array (
              'name' => 'New Mirpur',
              'latitude' => '33.1333',
              'longitude' => '73.75',
              'country' => 'Pakistan',
              'province' => 'Azad Kashmir',
              'population' => '124352',
            ),
            49 =>
            array (
              'name' => 'Kamalia',
              'latitude' => '30.7258',
              'longitude' => '72.6447',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '121401',
            ),
            50 =>
            array (
              'name' => 'Kot Addu',
              'latitude' => '30.47',
              'longitude' => '70.9644',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '120479',
            ),
            51 =>
            array (
              'name' => 'Nowshera',
              'latitude' => '34.0153',
              'longitude' => '71.9747',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '118594',
            ),
            52 =>
            array (
              'name' => 'Swabi',
              'latitude' => '34.1167',
              'longitude' => '72.4667',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '115018',
            ),
            53 =>
            array (
              'name' => 'Khushab',
              'latitude' => '32.2917',
              'longitude' => '72.35',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '110868',
            ),
            54 =>
            array (
              'name' => 'Dera Ismail Khan',
              'latitude' => '31.8167',
              'longitude' => '70.9167',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '109686',
            ),
            55 =>
            array (
              'name' => 'Chaman',
              'latitude' => '30.921',
              'longitude' => '66.4597',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => '107660',
            ),
            56 =>
            array (
              'name' => 'Charsadda',
              'latitude' => '34.1453',
              'longitude' => '71.7308',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '105414',
            ),
            57 =>
            array (
              'name' => 'Kandhkot',
              'latitude' => '28.4',
              'longitude' => '69.3',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '105011',
            ),
            58 =>
            array (
              'name' => 'Chishtian',
              'latitude' => '29.7958',
              'longitude' => '72.8578',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '101659',
            ),
            59 =>
            array (
              'name' => 'Hasilpur',
              'latitude' => '29.6967',
              'longitude' => '72.5542',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '99171',
            ),
            60 =>
            array (
              'name' => 'Attock Khurd',
              'latitude' => '33.7667',
              'longitude' => '72.3667',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '97374',
            ),
            61 =>
            array (
              'name' => 'Muzaffarabad',
              'latitude' => '34.37',
              'longitude' => '73.4711',
              'country' => 'Pakistan',
              'province' => 'Azad Kashmir',
              'population' => '96000',
            ),
            62 =>
            array (
              'name' => 'Mianwali',
              'latitude' => '32.5853',
              'longitude' => '71.5436',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '95007',
            ),
            63 =>
            array (
              'name' => 'Jalalpur Jattan',
              'latitude' => '32.7667',
              'longitude' => '74.2167',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '90130',
            ),
            64 =>
            array (
              'name' => 'Bhakkar',
              'latitude' => '31.6333',
              'longitude' => '71.0667',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '88472',
            ),
            65 =>
            array (
              'name' => 'Zhob',
              'latitude' => '31.3417',
              'longitude' => '69.4486',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => '88356',
            ),
            66 =>
            array (
              'name' => 'Dipalpur',
              'latitude' => '30.6708',
              'longitude' => '73.6533',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '87176',
            ),
            67 =>
            array (
              'name' => 'Kharian',
              'latitude' => '32.811',
              'longitude' => '73.865',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '85765',
            ),
            68 =>
            array (
              'name' => 'Mian Channun',
              'latitude' => '30.4397',
              'longitude' => '72.3544',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '82586',
            ),
            69 =>
            array (
              'name' => 'Bhalwal',
              'latitude' => '32.2653',
              'longitude' => '72.9028',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '82556',
            ),
            70 =>
            array (
              'name' => 'Jamshoro',
              'latitude' => '25.4283',
              'longitude' => '68.2822',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '80000',
            ),
            71 =>
            array (
              'name' => 'Pattoki',
              'latitude' => '31.0214',
              'longitude' => '73.8528',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '77210',
            ),
            72 =>
            array (
              'name' => 'Harunabad',
              'latitude' => '29.61',
              'longitude' => '73.1361',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '77206',
            ),
            73 =>
            array (
              'name' => 'Kahror Pakka',
              'latitude' => '29.6236',
              'longitude' => '71.9167',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '76098',
            ),
            74 =>
            array (
              'name' => 'Toba Tek Singh',
              'latitude' => '30.9667',
              'longitude' => '72.4833',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '75943',
            ),
            75 =>
            array (
              'name' => 'Samundri',
              'latitude' => '31.0639',
              'longitude' => '72.9611',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '73911',
            ),
            76 =>
            array (
              'name' => 'Shakargarh',
              'latitude' => '32.2628',
              'longitude' => '75.1583',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '73160',
            ),
            77 =>
            array (
              'name' => 'Sambrial',
              'latitude' => '32.475',
              'longitude' => '74.3522',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '71766',
            ),
            78 =>
            array (
              'name' => 'Shujaabad',
              'latitude' => '29.8803',
              'longitude' => '71.295',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '70595',
            ),
            79 =>
            array (
              'name' => 'Hujra Shah Muqim',
              'latitude' => '30.7408',
              'longitude' => '73.8219',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '70204',
            ),
            80 =>
            array (
              'name' => 'Kabirwala',
              'latitude' => '30.4068',
              'longitude' => '71.8667',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '70123',
            ),
            81 =>
            array (
              'name' => 'Mansehra',
              'latitude' => '34.3333',
              'longitude' => '73.2',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '69085',
            ),
            82 =>
            array (
              'name' => 'Lala Musa',
              'latitude' => '32.7006',
              'longitude' => '73.9558',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '67283',
            ),
            83 =>
            array (
              'name' => 'Chunian',
              'latitude' => '30.9639',
              'longitude' => '73.9803',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '64386',
            ),
            84 =>
            array (
              'name' => 'Nankana Sahib',
              'latitude' => '31.4492',
              'longitude' => '73.7124',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '63073',
            ),
            85 =>
            array (
              'name' => 'Bannu',
              'latitude' => '32.9889',
              'longitude' => '70.6056',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '62191',
            ),
            86 =>
            array (
              'name' => 'Pasrur',
              'latitude' => '32.2681',
              'longitude' => '74.6675',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '58644',
            ),
            87 =>
            array (
              'name' => 'Timargara',
              'latitude' => '34.8281',
              'longitude' => '71.8408',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '58050',
            ),
            88 =>
            array (
              'name' => 'Parachinar',
              'latitude' => '33.8992',
              'longitude' => '70.1008',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '55685',
            ),
            89 =>
            array (
              'name' => 'Chenab Nagar',
              'latitude' => '31.75',
              'longitude' => '72.9167',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '53965',
            ),
            90 =>
            array (
              'name' => 'Gwadar',
              'latitude' => '25.1264',
              'longitude' => '62.3225',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => '51901',
            ),
            91 =>
            array (
              'name' => 'Abdul Hakim',
              'latitude' => '30.5522',
              'longitude' => '72.1278',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '51494',
            ),
            92 =>
            array (
              'name' => 'Hassan Abdal',
              'latitude' => '33.8195',
              'longitude' => '72.689',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '50044',
            ),
            93 =>
            array (
              'name' => 'Tank',
              'latitude' => '32.2167',
              'longitude' => '70.3833',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '44996',
            ),
            94 =>
            array (
              'name' => 'Hangu',
              'latitude' => '33.5281',
              'longitude' => '71.0572',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '39766',
            ),
            95 =>
            array (
              'name' => 'Risalpur Cantonment',
              'latitude' => '34.0049',
              'longitude' => '71.9989',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '36653',
            ),
            96 =>
            array (
              'name' => 'Karak',
              'latitude' => '33.1167',
              'longitude' => '71.0833',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '35844',
            ),
            97 =>
            array (
              'name' => 'Kundian',
              'latitude' => '32.4522',
              'longitude' => '71.4718',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => '35406',
            ),
            98 =>
            array (
              'name' => 'Umarkot',
              'latitude' => '25.3614',
              'longitude' => '69.7361',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => '35059',
            ),
            99 =>
            array (
              'name' => 'Chitral',
              'latitude' => '35.8511',
              'longitude' => '71.7889',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '31100',
            ),
            100 =>
            array (
              'name' => 'Dainyor',
              'latitude' => '35.9206',
              'longitude' => '74.3783',
              'country' => 'Pakistan',
              'province' => 'Gilgit-Baltistan',
              'population' => '25000',
            ),
            101 =>
            array (
              'name' => 'Kulachi',
              'latitude' => '31.9286',
              'longitude' => '70.4592',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => '24738',
            ),
            102 =>
            array (
              'name' => 'Kalat',
              'latitude' => '29.0258',
              'longitude' => '66.59',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => '22879',
            ),
            103 =>
            array (
              'name' => 'Kotli',
              'latitude' => '33.5156',
              'longitude' => '73.9019',
              'country' => 'Pakistan',
              'province' => 'Azad Kashmir',
              'population' => '21462',
            ),
            104 =>
            array (
              'name' => 'Gilgit',
              'latitude' => '35.9208',
              'longitude' => '74.3144',
              'country' => 'Pakistan',
              'province' => 'Gilgit-Baltistan',
              'population' => '8851',
            ),
            105 =>
            array (
              'name' => 'Narowal',
              'latitude' => '32.102',
              'longitude' => '74.873',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            106 =>
            array (
              'name' => 'Khairpur Mir’s',
              'latitude' => '27.5295',
              'longitude' => '68.7592',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            107 =>
            array (
              'name' => 'Khanewal',
              'latitude' => '30.3017',
              'longitude' => '71.9321',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            108 =>
            array (
              'name' => 'Jhelum',
              'latitude' => '32.9333',
              'longitude' => '73.7333',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            109 =>
            array (
              'name' => 'Haripur',
              'latitude' => '33.9942',
              'longitude' => '72.9333',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            110 =>
            array (
              'name' => 'Shikarpur',
              'latitude' => '27.9556',
              'longitude' => '68.6382',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            111 =>
            array (
              'name' => 'Rawala Kot',
              'latitude' => '33.8578',
              'longitude' => '73.7604',
              'country' => 'Pakistan',
              'province' => 'Azad Kashmir',
              'population' => 'NULL',
            ),
            112 =>
            array (
              'name' => 'Hafizabad',
              'latitude' => '32.0709',
              'longitude' => '73.688',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            113 =>
            array (
              'name' => 'Lodhran',
              'latitude' => '29.5383',
              'longitude' => '71.6333',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            114 =>
            array (
              'name' => 'Malakand',
              'latitude' => '34.5656',
              'longitude' => '71.9304',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            115 =>
            array (
              'name' => 'Attock City',
              'latitude' => '33.7667',
              'longitude' => '72.3598',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            116 =>
            array (
              'name' => 'Batgram',
              'latitude' => '34.6796',
              'longitude' => '73.0263',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            117 =>
            array (
              'name' => 'Matiari',
              'latitude' => '25.5971',
              'longitude' => '68.4467',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            118 =>
            array (
              'name' => 'Ghotki',
              'latitude' => '28.0064',
              'longitude' => '69.315',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            119 =>
            array (
              'name' => 'Naushahro Firoz',
              'latitude' => '26.8401',
              'longitude' => '68.1227',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            120 =>
            array (
              'name' => 'Alpurai',
              'latitude' => '34.9',
              'longitude' => '72.6556',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            121 =>
            array (
              'name' => 'Bagh',
              'latitude' => '33.9803',
              'longitude' => '73.7747',
              'country' => 'Pakistan',
              'province' => 'Azad Kashmir',
              'population' => 'NULL',
            ),
            122 =>
            array (
              'name' => 'Daggar',
              'latitude' => '34.5111',
              'longitude' => '72.4844',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            123 =>
            array (
              'name' => 'Leiah',
              'latitude' => '30.9646',
              'longitude' => '70.9444',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            124 =>
            array (
              'name' => 'Tando Muhammad Khan',
              'latitude' => '25.1239',
              'longitude' => '68.5389',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            125 =>
            array (
              'name' => 'Chakwal',
              'latitude' => '32.93',
              'longitude' => '72.85',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            126 =>
            array (
              'name' => 'Badin',
              'latitude' => '24.6558',
              'longitude' => '68.8383',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            127 =>
            array (
              'name' => 'Lakki',
              'latitude' => '32.6072',
              'longitude' => '70.9123',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            128 =>
            array (
              'name' => 'Rajanpur',
              'latitude' => '29.1041',
              'longitude' => '70.3297',
              'country' => 'Pakistan',
              'province' => 'Punjab',
              'population' => 'NULL',
            ),
            129 =>
            array (
              'name' => 'Dera Allahyar',
              'latitude' => '28.4167',
              'longitude' => '68.1667',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            130 =>
            array (
              'name' => 'Shahdad Kot',
              'latitude' => '27.8473',
              'longitude' => '67.9068',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            131 =>
            array (
              'name' => 'Pishin',
              'latitude' => '30.5833',
              'longitude' => '67',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            132 =>
            array (
              'name' => 'Sanghar',
              'latitude' => '26.0464',
              'longitude' => '68.9481',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            133 =>
            array (
              'name' => 'Upper Dir',
              'latitude' => '35.2074',
              'longitude' => '71.8768',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            134 =>
            array (
              'name' => 'Thatta',
              'latitude' => '24.7461',
              'longitude' => '67.9243',
              'country' => 'Pakistan',
              'province' => 'Sindh',
              'population' => 'NULL',
            ),
            135 =>
            array (
              'name' => 'Dera Murad Jamali',
              'latitude' => '28.5466',
              'longitude' => '68.2231',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            136 =>
            array (
              'name' => 'Kohlu',
              'latitude' => '29.8965',
              'longitude' => '69.2532',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            137 =>
            array (
              'name' => 'Mastung',
              'latitude' => '29.7997',
              'longitude' => '66.8455',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            138 =>
            array (
              'name' => 'Dasu',
              'latitude' => '35.2917',
              'longitude' => '73.2906',
              'country' => 'Pakistan',
              'province' => 'Khyber Pakhtunkhwa',
              'population' => 'NULL',
            ),
            139 =>
            array (
              'name' => 'Athmuqam',
              'latitude' => '34.5717',
              'longitude' => '73.8972',
              'country' => 'Pakistan',
              'province' => 'Azad Kashmir',
              'population' => 'NULL',
            ),
            140 =>
            array (
              'name' => 'Loralai',
              'latitude' => '30.3705',
              'longitude' => '68.5979',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            141 =>
            array (
              'name' => 'Barkhan',
              'latitude' => '29.8977',
              'longitude' => '69.5256',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            142 =>
            array (
              'name' => 'Musa Khel Bazar',
              'latitude' => '30.8594',
              'longitude' => '69.8221',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            143 =>
            array (
              'name' => 'Ziarat',
              'latitude' => '30.3814',
              'longitude' => '67.7258',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            144 =>
            array (
              'name' => 'Gandava',
              'latitude' => '28.6132',
              'longitude' => '67.4856',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            145 =>
            array (
              'name' => 'Sibi',
              'latitude' => '29.543',
              'longitude' => '67.8773',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            146 =>
            array (
              'name' => 'Dera Bugti',
              'latitude' => '29.0362',
              'longitude' => '69.1585',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            147 =>
            array (
              'name' => 'Eidgah',
              'latitude' => '35.3471',
              'longitude' => '74.8563',
              'country' => 'Pakistan',
              'province' => 'Gilgit-Baltistan',
              'population' => 'NULL',
            ),
            148 =>
            array (
              'name' => 'Uthal',
              'latitude' => '25.8072',
              'longitude' => '66.6228',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            149 =>
            array (
              'name' => 'Khuzdar',
              'latitude' => '27.7384',
              'longitude' => '66.6434',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            150 =>
            array (
              'name' => 'Chilas',
              'latitude' => '35.4206',
              'longitude' => '74.0967',
              'country' => 'Pakistan',
              'province' => 'Gilgit-Baltistan',
              'population' => 'NULL',
            ),
            151 =>
            array (
              'name' => 'Panjgur',
              'latitude' => '26.9644',
              'longitude' => '64.0903',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            152 =>
            array (
              'name' => 'Gakuch',
              'latitude' => '36.1736',
              'longitude' => '73.7667',
              'country' => 'Pakistan',
              'province' => 'Gilgit-Baltistan',
              'population' => 'NULL',
            ),
            153 =>
            array (
              'name' => 'Qila Saifullah',
              'latitude' => '30.7008',
              'longitude' => '68.3598',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            154 =>
            array (
              'name' => 'Kharan',
              'latitude' => '28.5833',
              'longitude' => '65.4167',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            155 =>
            array (
              'name' => 'Aliabad',
              'latitude' => '36.3078',
              'longitude' => '74.6178',
              'country' => 'Pakistan',
              'province' => 'Gilgit-Baltistan',
              'population' => 'NULL',
            ),
            156 =>
            array (
              'name' => 'Awaran',
              'latitude' => '26.4568',
              'longitude' => '65.2314',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            157 =>
            array (
              'name' => 'Dalbandin',
              'latitude' => '28.8885',
              'longitude' => '64.4062',
              'country' => 'Pakistan',
              'province' => 'Balochistān',
              'population' => 'NULL',
            ),
            158 =>
            array (
              'name' => 'Murree',
              'latitude' => '33.9070',
              'longitude' => '73.3943',
              'country' => 'Pakistan',
              'province' => 'Pubjab',
              'population' => 'NULL',
            ),
          );

        for ($i=0; $i <= 158; $i++) {

            city::create($cities[$i]);
        }

        $tour1 = [
            'name' => 'Murre Hills View',
            'description' => "Massive glaciers, staggering mountains, plains dotted with wild animals: We sure live in a big,
             beautiful world. In fact, when looking at the most beautiful places in the world,
              it can feel impossible to decide where to visit next.",
            'city_from' => 4,
            'city_to' => 159,
            'distance' => '100 KM',
            'tour_type' => 'Family',
            'season' => 'Spring',
            'day' => 3,
            'max_person' => 50,
            'image' => 'tour1.jpg',
            'trip_date' => date('Y-m-d H:i:s' , strtotime('04/09/2022')),
            'package_1' => 2000,
            'package_2' => 4000,
            'package_3' => 6000,
            'agency_id' => null
        ];
        $tour2 = [
            'name' => 'Gilgit View',
            'description' => "Massive glaciers, staggering mountains, plains dotted with wild animals: We sure live in a big,
             beautiful world. In fact, when looking at the most beautiful places in the world,
              it can feel impossible to decide where to visit next.",
            'city_from' => 4,
            'city_to' => 105,
            'distance' => '500 KM',
            'tour_type' => 'Family',
            'season' => 'Summer',
            'day' => 6,
            'max_person' => 50,
            'image' => 'tour2.jpg',
            'trip_date' => date('Y-m-d H:i:s' , strtotime('04/09/2022')),
            'package_1' => 1000,
            'package_2' => 2000,
            'package_3' => 3000,
            'agency_id' => null
        ];
        $tour3 = [
            'name' => 'karachi Sea View',
            'description' => "Massive glaciers, staggering mountains, plains dotted with wild animals: We sure live in a big,
             beautiful world. In fact, when looking at the most beautiful places in the world,
              it can feel impossible to decide where to visit next.",
            'city_from' => 4,
            'city_to' => 1,
            'distance' => '100 KM',
            'tour_type' => 'Single',
            'season' => 'Spring',
            'day' => 3,
            'max_person' => 50,
            'image' => 'tour3.jpg',
            'trip_date' => date('Y-m-d H:i:s' , strtotime('04/09/2022')),
            'package_1' => 2000,
            'package_2' => 3000,
            'package_3' => 4000,
            'agency_id' => null
        ];
        $tour4 = [
            'name' => 'Minar-e-Pakistan View',
            'description' => "Massive glaciers, staggering mountains, plains dotted with wild animals: We sure live in a big,
             beautiful world. In fact, when looking at the most beautiful places in the world,
              it can feel impossible to decide where to visit next.",
            'city_from' => 4,
            'city_to' => 2,
            'distance' => '100 KM',
            'tour_type' => 'Family',
            'season' => 'Winter',
            'day' => 6,
            'max_person' => 50,
            'image' => 'tour4.jpg',
            'trip_date' => date('Y-m-d H:i:s' , strtotime('04/09/2022')),
            'package_1' => 1000,
            'package_2' => 3000,
            'package_3' => 5000,
            'agency_id' => null
        ];

        $tour = array(
             'tour1' => $tour1,
             'tour2' => $tour2,
             'tour3' => $tour3,
             'tour4' => $tour4,
        );


        for ($i=1; $i <= 4; $i++) {

            Tour::create($tour['tour'.$i]);
        }

    }
}
