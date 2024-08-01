<?php

namespace App\Models;

class Event
{
    public static function all()
    {
      return array(
        array(
            "name" => "Tech Conference 2024",
            "location" => "San Francisco, CA",
            "date" => "2024-09-15",
            "time" => "09:00 AM",
            "creator" => "John Doe",
            "description" => "A conference for tech enthusiasts to discuss the latest trends in technology."
        ),
        array(
            "name" => "Art Expo",
            "location" => "New York, NY",
            "date" => "2024-10-10",
            "time" => "10:00 AM",
            "creator" => "Jane Smith",
            "description" => "An exhibition showcasing contemporary art from around the world."
        ),
        array(
            "name" => "Music Festival",
            "location" => "Austin, TX",
            "date" => "2024-11-20",
            "time" => "03:00 PM",
            "creator" => "Emily Johnson",
            "description" => "A weekend-long festival featuring live music from various genres."
        ),
        array(
            "name" => "Food Truck Rally",
            "location" => "Portland, OR",
            "date" => "2024-08-05",
            "time" => "11:00 AM",
            "creator" => "Mike Brown",
            "description" => "A gathering of the best food trucks in the city offering a variety of cuisines."
        ),
        array(
            "name" => "Charity Run",
            "location" => "Chicago, IL",
            "date" => "2024-07-22",
            "time" => "07:00 AM",
            "creator" => "Sarah Davis",
            "description" => "A 5k run to raise funds for local charities."
        ),
        array(
            "name" => "Book Fair",
            "location" => "Los Angeles, CA",
            "date" => "2024-09-30",
            "time" => "10:00 AM",
            "creator" => "Tom Wilson",
            "description" => "A fair featuring book signings, author readings, and literary discussions."
        ),
        array(
            "name" => "Film Festival",
            "location" => "Miami, FL",
            "date" => "2024-12-05",
            "time" => "06:00 PM",
            "creator" => "Laura Martinez",
            "description" => "A showcase of independent films from emerging filmmakers."
        ),
        array(
            "name" => "Science Fair",
            "location" => "Seattle, WA",
            "date" => "2024-08-15",
            "time" => "09:00 AM",
            "creator" => "Robert Clark",
            "description" => "A fair featuring science projects and experiments from students of all ages."
        ),
        array(
            "name" => "Craft Fair",
            "location" => "Denver, CO",
            "date" => "2024-11-10",
            "time" => "08:00 AM",
            "creator" => "Megan Lewis",
            "description" => "A fair where local artisans display and sell their handmade crafts."
        ),
        array(
            "name" => "Dance Workshop",
            "location" => "Boston, MA",
            "date" => "2024-10-25",
            "time" => "01:00 PM",
            "creator" => "Chris Evans",
            "description" => "A workshop for dancers of all levels to learn new techniques and styles."
        )
      );
    }
}
