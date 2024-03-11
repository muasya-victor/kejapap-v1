<!-- add_property_form.php -->

<!-- add_property_form.php -->

<form id="propertyForm" class="p-4 flex flex-col items-start justify-center gap-4 w-full rounded-lg bg-white"
      enctype="multipart/form-data">

    <h3 class="text-lg font-bold">Property Addition</h3>

    <div class="grid md:grid-cols-1 gap-4 w-full">
        <!-- Your form fields here -->

        <!-- House Type -->
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="house_type">House Type</label>
            <select name="house_type" id="house_type" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400">
                <option value="">Select An Option</option>
                <option value="single_room">Single Room</option>
                <option value="one_bedroom">One Bedroom</option>
                <option value="two_bedroom">Two Bedroom</option>
            </select>
        </div>

        <!-- Price -->
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="price">Price In KSH</label>
            <input type="number" name="price" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400">
        </div>

        <!-- Avatar -->
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="border-b-2 p-2
                focus-none outline-none
                text-gray-600 border-gray-400">
        </div>

        <!-- Location Description -->
        <div class="flex flex-col gap-1 w-[90%]">
            <label for="location">Location Description</label>
            <textarea name="location" class="border-b-2 py-2
                focus-none outline-none
                text-gray-600 border-gray-400"></textarea>
        </div>
    </div>

    <!-- Submit Button -->
    <input type="submit" name="submit" id="submitBtn" class="my-2 h-10 w-[16] px-10 bg-[#3E2093] text-white  rounded-2xl"
           value="Submit">

</form>

<script>
    // AJAX form submission
    document.getElementById('propertyForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Create FormData object to store form data
        var formData = new FormData(this);

        // Send AJAX request to registerProperty.php
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'logic/registerProperty.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Successful response
                    alert("Property added successfully!");
                    // Clear form fields if needed
                    document.getElementById('propertyForm').reset();
                } else {
                    // Error response
                    alert("Error adding property: " + xhr.responseText);
                }
            }
        };
        xhr.send(formData);
    });
</script>
