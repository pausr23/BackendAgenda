<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RegisteredActivity;

class RegisteredActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RegisteredActivity::create(['title'=>'Python Workshop','description'=>'A hands-on workshop to learn the basics of Python programming, including data types, loops.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'1','scheduled_at'=>'2024-05-24','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'JavaScript Bootcamp','description'=>'Deep dive into JavaScript concepts such as closures, asynchronous programming.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'1','scheduled_at'=>'2024-05-25','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Web Design Seminar','description'=>'Learn how to create websites that work seamlessly on all devices using CSS frameworks.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'2','scheduled_at'=>'2024-05-26','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'HTML5 and CSS3 Course','description'=>'Course covering modern HTML5 elements and CSS3 properties for creating dynamic web pages.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'2','scheduled_at'=>'2024-05-27','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Testing with Selenium','description'=>'Practical workshop on setting up and writing automated tests using Selenium.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'3','scheduled_at'=>'2024-05-28','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Manual Testing Techniques','description'=>'Learn effective manual testing techniques, test case creation and bug reporting.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'3','scheduled_at'=>'2024-05-29','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Grammar for Beginners','description'=>'A class covering essential Spanish grammar rules and structures for beginners.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'4','scheduled_at'=>'2024-05-30','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Advanced Spanish Syntax','description'=>'Delve into complex Spanish syntax and grammar to enhance your fluency.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'4','scheduled_at'=>'2024-05-31','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Digital Illustration Basics','description'=>'An introductory class on digital illustration techniques using softwares.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'5','scheduled_at'=>'2024-06-01','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Character Design','description'=>'Learn the fundamentals of character design, from initial sketches to digital rendering.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'5','scheduled_at'=>'2024-06-02','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Cybersecurity','description'=>'Explore the basics of cybersecurity, including common threats and protective measures.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'6','scheduled_at'=>'2024-06-03','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Secure Coding Practices','description'=>'Understand best practices for writing secure code to prevent common vulnerabilities.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'6','scheduled_at'=>'2024-06-04','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Adobe Photoshop for Beginners','description'=>'Learn the essentials of photo editing and graphic creation.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'7','scheduled_at'=>'2024-06-05','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Logo Design Masterclass','description'=>'A masterclass focusing on the principles of effective logo design and branding.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'7','scheduled_at'=>'2024-06-06','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Video Editing','description'=>'Learn basic video editing techniques using software like Adobe Premiere Pro.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'8','scheduled_at'=>'2024-06-07','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Sound Design Workshop','description'=>'Explore the art of sound design for various media.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'8','scheduled_at'=>'2024-06-08','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Development for Beginners','description'=>'A beginner-friendly course on creating Android apps using Android Studio.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'9','scheduled_at'=>'2024-06-09','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'iOS App Development','description'=>'An intensive bootcamp to learn how to develop apps for iOS using Swift.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'9','scheduled_at'=>'2024-06-10','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Basics of Digital Photography','description'=>'Learn the fundamentals of digital photography, camera settings and composition.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'10','scheduled_at'=>'2024-06-11','image'=>'placeholder.jpg']);
        RegisteredActivity::create(['title'=>'Portrait Photography','description'=>'A hands-on workshop focusing on techniques for capturing stunning portrait photographs.','categories_activities_id'=>'3','status_activities_id'=>'1','courses_activities_id'=>'10','scheduled_at'=>'2024-06-12','image'=>'placeholder.jpg']);

    }
}
