window.onload = function() {
    // Get the query parameters from the URL
    var urlParams = new URLSearchParams(window.location.search);

    // Get the values from the query parameters
    var MovieId = urlParams.get('MovieId');
    var TheatreId = urlParams.get('TheatreId');
    var SlotId = urlParams.get('SlotId');
    var Date = urlParams.get('Date');

    fetch('seats.php?action=get_seat_availability&MovieId=' + MovieId + '&TheatreId=' + TheatreId + '&SlotId=' + SlotId + '&Date=' + Date)
        .then(response => response.text())
    
        // .then(response => {
        //         response.text().then(text => console.log(text));  // Log response text (for debug)
        //         return response.json();
        //     })

        .then(data => {
            var bookedSeats = data.split(',');
            console.log('Booked seats: ' + bookedSeats);

            console.log(bookedSeats);  // Log the bookedSeats array
            var seats = document.getElementsByClassName('seat');
            for (var i = 0; i < seats.length; i++) {
                // var seatId = parseInt(seats[i].id, 10);
                var seatId = parseInt(seats[i].id, 10).toString();
                // console.log(seatId);  // Log each seatId

                // If the seat is booked, add the 'booked' class
                if (bookedSeats.includes(seatId)) {
                    seats[i].classList.add('booked');
                } else {
                    seats[i].classList.add('available');

                    // Add a click event listener to each available seat
                    seats[i].addEventListener('click', function() {
                        if (this.classList.contains('selected')) {
                            this.classList.remove('selected');
                        } else {
                            this.classList.add('selected');
                        }
                    });
                }
            }
        });
};

document.getElementById('confirm-btn').addEventListener('click', function() {
    var urlParams = new URLSearchParams(window.location.search);

    // Get the values from the query parameters
    var MovieId = urlParams.get('MovieId');
    var TheatreId = urlParams.get('TheatreId');
    var SlotId = urlParams.get('SlotId');
    var Date = urlParams.get('Date');

    // Confirm booking
    var confirmed = confirm('Are you sure you want to confirm the booking?');
    if (!confirmed) {
        return;  // If the user clicked Cancel, exit the function
    }

    // Fetch the ShowtimeID
    fetch('seats.php?action=get_showtime&MovieId=' + MovieId + '&TheatreId=' + TheatreId + '&SlotId=' + SlotId + '&Date=' + Date)
        .then(response => response.text())
        .then(ShowtimeID => {
            console.log('Showtime ID: ' + ShowtimeID);

            // Get the selected seats
            var selectedSeats = Array.from(document.getElementsByClassName('selected')).map(function(seat) {
                return parseInt(seat.id, 10);
            });

            // Send a fetch request for each selected seat
            selectedSeats.forEach(function(SeatID) {
                fetch('seats.php?action=make_booking&ShowtimeID=' + ShowtimeID + '&SeatID=' + SeatID)
                    .then(response => response.text())
                    .then(result => {
                        if (result === 'success') {
                            alert('Booking confirmed for Seat ' + SeatID);
                            window.location.href = 'index.php';
                        } else {
                            console.error('Error:', result);
                        }
                    });
            });
        });
});

function openForm() {
    document.getElementById("myForm").style.display = "block";
    }

function closeForm() {
    document.getElementById("myForm").style.display = "none";
    }
    
function signOut() {
    // Send a request to the signout.php script
    fetch('signout.php')
    .then(response => response.text())
    .then(data => {
        // If the sign out was successful, reload the page
        if (data === 'success') {
            location.reload();
        } else {
            // Handle error
            console.error('Error:', data);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
function openProfile() {
    window.location.href = "profilepage.php";
}