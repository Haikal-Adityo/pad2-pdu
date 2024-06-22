document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('wellDropdown').addEventListener('change', function() {
        var wellId = this.value;
        if (wellId) {
            window.location.href = '/history/well/' + wellId; // Replace with your route
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var sensorDropdown = document.getElementById('sensorDropdown');
    var currentUrl = window.location.href.split('/');

    sensorDropdown.addEventListener('change', function() {
        var sensorId = this.value;
        if (sensorId) {
            // Check if the URL already contains a well ID segment
            var indexOfWellId = currentUrl.indexOf('well'); // Find index of 'well' segment

            if (indexOfWellId !== -1) {
                // Replace the sensor ID segment (if exists) or add it
                if (currentUrl[indexOfWellId + 2]) {
                    currentUrl[indexOfWellId + 2] = sensorId; // Replace existing sensor ID
                } else {
                    currentUrl.splice(indexOfWellId + 2, 0, sensorId); // Add new sensor ID
                }
            } else {
                // If 'well' segment not found, add 'well' and sensor ID segments
                currentUrl.push('well', sensorId);
            }

            // Join the modified URL array back into a string and navigate
            window.location.href = currentUrl.join('/');
        }
    });
});





