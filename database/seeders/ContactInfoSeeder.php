<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactInfo::create([
            'logo' => 'https://yt3.googleusercontent.com/QnR6apNptjfsica8DNvb0mazAPXkNml4NOj6HDek7DMaenlwCrhcp9FNV8hQGShgqPzfYLSMzw=s120-c-k-c0x00ffffff-no-rj', // Example logo file name (stored in public directory)
            'name' => 'Code Zack',
            'about' => 'Code Zack s content is presented in a clear and concise manner, making it easy for viewers to follow along and learn at their own pace. Sarvesh, the host of the channel, is passionate about web development and brings a wealth of knowledge and experience to his videos.',
            'phone' => '9621122159',
            'email' => 'vsarveshpal6062@gmail.com',
            'twitter_link' => 'https://www.youtube.com/channel/UCWZdcPIr_eeOvAFsrbrRMug',
            'facebook_link' => 'https://www.youtube.com/channel/UCWZdcPIr_eeOvAFsrbrRMug',
            'youtube_link' => 'https://www.youtube.com/channel/UCWZdcPIr_eeOvAFsrbrRMug',
            'linkedin_link' => 'https://www.youtube.com/channel/UCWZdcPIr_eeOvAFsrbrRMug',
            'instagram_link' => 'https://www.youtube.com/channel/UCWZdcPIr_eeOvAFsrbrRMug',
            'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113996.60078799856!2d83.4039116!3d26.76371515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3991446a0c332489%3A0x1ff3f97fdcc6bfa2!2sGorakhpur%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1720179325482!5m2!1sen!2sin',
            'address' => 'Civil Line Golghar Gorakhpur Uttar Padesh India',
        ]);
    }
}
