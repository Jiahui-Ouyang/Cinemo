const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const seatContainer = document.querySelector(".row-container");
const count = document.getElementById("count");
const total = document.getElementById("total");
// const seat_maintenance = document.querySelectorAll(".maintenance");
// const movieSelect = document.getElementById("movie");

// Another Approach

// seats.forEach(function(seat) {
//   seat.addEventListener("click", function(e) {
//     seat.classList.add("selected");
//     const selectedSeats = document.querySelectorAll(".container .selected");
//     selectedSeathLength = selectedSeats.length;
//     count.textContent = selectedSeathLength;
//     let ticketPrice = +movieSelect.value;
//     total.textContent = ticketPrice * selectedSeathLength;
//   });
// });

//localStorage.clear();


populateUI();
updateSelectedCount();


function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll(".container .selected");

  seatsIndex = [...selectedSeats].map(function (seat) {
    return [...seats].indexOf(seat);
  });

  const firstselectedSeats = document.querySelectorAll("#standard .selected");
  const secondselectedSeats = document.querySelectorAll("#luxury .selected");

  firstseatsIndex = [...firstselectedSeats].map(function (seat) {
    return [...seats].indexOf(seat);
  });
  secondseatsIndex = [...secondselectedSeats].map(function (seat) {
    return [...seats].indexOf(seat);
  });

  let selectedfirstSeatsCount = firstseatsIndex.length;
  let selectedsecondSeatsCount = secondseatsIndex.length;

  let total_first_seats = selectedfirstSeatsCount * first_seat_price;
  let total_second_seats = selectedsecondSeatsCount * second_seat_price;

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));


  let selectedSeatsCount = seatsIndex.length - 1;

  count.textContent = selectedSeatsCount;
  total.textContent = total_first_seats + total_second_seats;
  localStorage.setItem("pp", total.textContent);
}

// Get data from localstorage and populate
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

  if (selectedSeats !== null && selectedSeats.length > -1) {
    seats.forEach(function (seat, index) {
      if (selectedSeats.indexOf(index) < -1) {
        seat.classList.add("selected");
      }
    });
  }

  // const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

  // if (selectedMovieIndex !== null) {
  //   movieSelect.selectedIndex = selectedMovieIndex;
  // }
}

// Movie select event

// movieSelect.addEventListener("change", function (e) {
//   //ticketPrice = +movieSelect.value;
//   setMovieData(e.target.selectedIndex, e.target.value);
//   updateSelectedCount();
// });

// Adding selected class to non-occupied and non-maintenance seats on 'click'

seatContainer.addEventListener("click", function (e) {
  if (
    e.target.classList.contains("seat") &&
    (!e.target.classList.contains("occupied") || !e.target.classList.contains("maintenance"))
  ) {
    e.target.classList.toggle("selected");
    // seat_maintenance.style.pointerEvents = 'none';
    updateSelectedCount();
  }
});

// Initial count and total rendering
updateSelectedCount();