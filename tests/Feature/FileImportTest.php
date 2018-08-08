<?php
namespace Tests\Feature;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileImportTest extends TestCase
{
    // use DatabaseTransactions;

    /**
     * @test
     *
     * POST: /api/subscribers/csv/import
     */
    public function Import_customers_from_csv_file()
    {
        $path = realpath(__DIR__."/testImportCustomersFile.csv");
        $original_name = 'testImportCustomersFile.csv';
        $mime_type = 'text/csv';
        $error = null;
        $size = 906;
        $test = true;
        // dd($path);
        $file = new UploadedFile($path, $original_name, $mime_type, $size, $error, $test);
        // dd($file);
        $response = $this->json('POST', '/customers/import', ['file' => $file]);
        // dd($response);
        $response->assertStatus(200);
        
        // $this->seeInDatabase('customers', [
        //     'name' => 'Thor',
        //     'customer_code' => 'stormbreaker',
        //     'tax_number' => 'as12ga34rd56',
        //     'contact_number' => '1234567890',
        //     'email_address' => 'electronic@mail.com',
        //     'website' => 'www.asgard.com',
        //     'notes' => 'I’m Thor, Son of Odin',
        //     'accepts_marketing' => 1,
        //     'enabled' => 1,
        // ]);
        // $this->seeInDatabase('customer_groups', [
        //     'name' => 'Avengers',
        // ]);
        // $this->seeInDatabase('customer_contacts', [
        //     'first_name' => 'Loki',
        //     'last_name' => 'Odinson',
        //     'designation' => 'God of Mischief',
        //     'email' => 'loki@mischief.com',
        //     'mobile_number' => 1234567890,
        //     'phone_number' => 987654321,
        //     'gender' => 0,
        //     'facebook' => 'lokiasgardking',
        //     'twitter' => 'lokiAsgardKing',
        //     'primary' => 'TRUE',
        // ]);
        // $this->seeInDatabase('customer_address', [
        //     'name' => 'Home',
        //     'type' => 0,
        //     'company_name' => 'Rainbow Bridge',
        //     'attention' => 'Wormhole',
        //     'address_1' => 'From any place',
        //     'address_2' => 'Contact Heimdail',
        //     'landmark' => 'Bifrost',
        //     'city' => 'Asgard City',
        //     'state' => 'Asgard State',
        //     'country_code' => 'in',
        //     'zipcode' => 'A123',
        //     'latitude' => 12.9724420,
        //     'longitude' => 77.5806430,
        //     'primary' => 1,
        // ]);        
    }
}
