<?php
    session_start();
    $db = new mysqli('localhost', 'f31ee', 'f31ee', 'cinema');

    function generate_table($db, $result) {
        $movieNames = array('1' => 'Teenage Mutant Ninja Turtles: Mutant Mayhem', '2' => 'The Dive', '3' => 'The Equalizer 3');
        $slotTimes = array('1' => '10:00am', '2' => '01:00pm', '3' => '04:00pm', '4' => '07:00pm', '5' => '10:00pm');
        $theatreName = array('1' => 'Da Jia Cineplex Nanyang Technological University', '3' => 'Da Jia Cineplex Tampines');

        $html = '<table class="center">';
        $html .= '<tr><th>Movie</th><th>Theatre</th><th>Time Slot</th><th>ShowDate</th><th>Seat Number</th></tr>';

        // Fetch booking details
        while ($booking = $result->fetch_assoc()) {
            $html .= '<tr>';

            // Query showtimes table using the ShowtimeID
            $stmt = $db->prepare("SELECT * FROM showtimes WHERE ShowtimeID = ?");
            $stmt->bind_param("i", $booking['ShowtimeID']);
            $stmt->execute();
            $showtime_result = $stmt->get_result();
            $showtime = $showtime_result->fetch_assoc();

            // Add showtime details to the table
            $html .= '<td>' . $movieNames[$showtime['MovieID']] . '</td>';
            $html .= '<td>' . $theatreName[$showtime['TheatreID']] . '</td>';
            $html .= '<td>' . $slotTimes[$showtime['SlotID']] . '</td>';
            $html .= '<td>' . $showtime['ShowDate'] . '</td>';
            $html .= '<td>' . $booking['SeatID'] . '</td>';

            $html .= '</tr>';
        }

        $html .= '</table>';

        return $html;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search = $_POST['search'];

        // Check search input
        if (is_numeric($search)) {
            // Query bookings table directly
            $stmt = $db->prepare("SELECT * FROM bookings WHERE BookingID = ?");
            $stmt->bind_param("i", $search);
        } else {
            // Query customers table
            $stmt = $db->prepare("SELECT CustomerID FROM customers WHERE Email = ?");
            $stmt->bind_param("s", $search);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // Query bookings table
            $stmt = $db->prepare("SELECT * FROM bookings WHERE CustomerID = ?");
            $stmt->bind_param("i", $user['CustomerID']);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        echo generate_table($db, $result);
    }
?>

<style>
    .center {
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        border-collapse: collapse;
        width: 50%;
    }

    .center th, .center td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .center th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #333333;
        color: white;
    }
</style>
