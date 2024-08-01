// Function to calculate the number of nights between two dates
function calculateNights(checkin, checkout) {
    const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
    const firstDate = new Date(checkin);
    const secondDate = new Date(checkout);

    return Math.round(Math.abs((firstDate - secondDate) / oneDay));
}

document.getElementById('hotel').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const image = selectedOption.getAttribute('data-image');
    const cost = selectedOption.getAttribute('data-cost');
    
    if (image && cost) {
        document.getElementById('hotelImage').src = image;
        document.getElementById('hotelCost').textContent = `Cost: $${cost}/night`;
        document.getElementById('hotelDetails').style.display = 'block';
    } else {
        document.getElementById('hotelDetails').style.display = 'none';
    }
});

document.getElementById('bookingForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const hotel = document.getElementById('hotel').value;
    const checkin = document.getElementById('checkin').value;
    const checkout = document.getElementById('checkout').value;

    if (!hotel) {
        alert('Please select a hotel.');
        return;
    }

    if (new Date(checkin) >= new Date(checkout)) {
        alert('Check-out date must be after check-in date.');
        return;
    }

    const numberOfNights = calculateNights(checkin, checkout);
    const costPerNight = parseFloat(document.getElementById('hotel').options[document.getElementById('hotel').selectedIndex].getAttribute('data-cost'));
    const totalCost = numberOfNights * costPerNight;

    alert(`Booking confirmed at ${hotel} from ${checkin} to ${checkout}. Total cost: $${totalCost.toFixed(2)}`);
});
