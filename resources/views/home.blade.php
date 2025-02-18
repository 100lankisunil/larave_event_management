<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Event Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
        }

        h2,
        h3 {
            color: #343a40;
        }

        .form-label {
            font-weight: bold;
        }

        .session-block,
        .speaker-block {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        #event_form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .session-block h4 {
            color: #007bff;
        }

        .btn-secondary,
        .btn-danger {
            margin-top: 10px;
        }

        .btn-danger {
            margin-left: 10px;
        }

        .btn-success {
            width: 100%;
            margin-top: 20px;
        }

        .mb-3,
        .mb-2 {
            margin-bottom: 1rem;
        }

        .border-bottom {
            border-bottom: 2px solid #007bff;
        }

        .form-control {
            border-radius: 0.375rem;
        }

        .btn-primary {
            margin-top: 10px;
        }

        .session-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .session-header h4 {
            margin: 0;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container mb-5">
        <h2 class="text-center mb-4">Main Event Form</h2>
        <form method="POST" id='event_form' class="p-3">
            @csrf

            <!-- Basic Event Details -->
            <div class="mb-3">
                <label for="event_title" class="form-label">Event Title</label>
                <input type="text" name="event[title]" class="form-control" required>

            </div>
            <div class="mb-3">
                <label for="event_description" class="form-label">Description</label>
                <textarea name="event[description]" class="form-control" required></textarea>

            </div>
            <div class="mb-3">
                <label for="event_start_date" class="form-label">Start Date</label>
                <input type="date" name="event[start_date]" class="form-control" required>

            </div>
            <div class="mb-3">
                <label for="event_end_date" class="form-label">End Date</label>
                <input type="date" name="event[end_date]" class="form-control" required>

            </div>
            <div class="mb-3">
                <label for="event_venue" class="form-label">Venue</label>
                <input type="text" name="event[venue]" class="form-control" required>

            </div>

            <h3 class="border-bottom pb-3">Sessions</h3>
            <div id="sessions-container">
                <!-- Dynamic Sessions Will Be Added Here -->
            </div>

            {{-- <button type="button" class="btn btn-primary" onclick="addSession()">Add Session</button>s --}}

            <button type="button" class="btn btn-primary add_session_btn">Add Session</button>
            <br><br>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>





    {{-- <script>
        let sessionIndex = 0;

        function addSession() {
            let sessionHtml = `
                <div class="session-block p-3 mb-3" id="session-${sessionIndex}">
                    <div class="session-header mb-3">
                        <h4>Session ${sessionIndex + 1}</h4>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSession(${sessionIndex})">Remove Session</button>
                    </div>
                    <input type="text" name="event[sessions][${sessionIndex}][title]" class="form-control mb-2" placeholder="Session Title" required>
                    <input type="datetime-local" name="event[sessions][${sessionIndex}][start_time]" class="form-control mb-2" required>
                    <input type="datetime-local" name="event[sessions][${sessionIndex}][end_time]" class="form-control mb-2" required>
                    <input type="text" name="event[sessions][${sessionIndex}][room_number]" class="form-control mb-2" placeholder="Room Number" required>
                    <input type="number" name="event[sessions][${sessionIndex}][capacity]" class="form-control mb-2" placeholder="Capacity" required>
                    <div id="speakers-container-${sessionIndex}"></div>
                    <button type="button" class="btn btn-secondary" onclick="addSpeaker(${sessionIndex})">Add Speaker</button>
                </div>
            `;

            document.getElementById('sessions-container').insertAdjacentHTML('beforeend', sessionHtml);
            sessionIndex++;
        }

        function removeSession(index) {
            document.getElementById(`session-${index}`).remove();
        }

        function addSpeaker(sessionId) {
            let speakerContainer = document.getElementById(`speakers-container-${sessionId}`);
            let speakerIndex = speakerContainer.children.length;

            let speakerHtml = `
                <div class="speaker-block p-2 mb-2" id="session-${sessionId}-speaker-${speakerIndex}">
                    <input type="text" name="event[sessions][${sessionId}][speakers][${speakerIndex}][name]" class="form-control mb-2" placeholder="Speaker Name" required>
                    <input type="text" name="event[sessions][${sessionId}][speakers][${speakerIndex}][bio]" class="form-control mb-2" placeholder="Speaker Bio">
                    <input type="text" name="event[sessions][${sessionId}][speakers][${speakerIndex}][presentation_title]" class="form-control mb-2" placeholder="Presentation Title">
                    <input type="email" name="event[sessions][${sessionId}][speakers][${speakerIndex}][email]" class="form-control mb-2" placeholder="Speaker Email" required>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeSpeaker(${sessionId}, ${speakerIndex})">Remove Speaker</button>
                </div>
            `;

            speakerContainer.insertAdjacentHTML('beforeend', speakerHtml);
        }

        function removeSpeaker(sessionId, speakerIndex) {
            document.getElementById(`session-${sessionId}-speaker-${speakerIndex}`).remove();
        }
    </script> --}}

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            let sessionIndex = 0;

            $(document).on('click', '.add_session_btn', function() {
                let sessionIndex = $(".session-block").length;
                let sessionHtml = `
                    <div class="session-block border p-3 mb-3" id="session-${sessionIndex}">
                        <h4 class='mb-2'>Session</h4>
                        <div class="d-flex flex-wrap">
                            <div class='flex-grow-1 me-2'>
                                <lable> Session Title:</lable>
                                <input type="text" name="event[sessions][${sessionIndex}][title]" class="form-control mb-1" placeholder="Session Title">
                            </div>
                            <div class='flex-grow-1 me-2'>
                                <lable> Start time:</lable>
                                <input type="datetime-local" name="event[sessions][${sessionIndex}][start_time]" class="form-control mb-1">
                            </div>
                            <div class='flex-grow-1 me-2'>
                                <lable> End time:</lable>
                                <input type="datetime-local" name="event[sessions][${sessionIndex}][end_time]" class="form-control mb-1">
                            </div>
                            <div class='flex-grow-1 me-2'>
                                <lable> Roome number:</lable>
                                <input type="text" name="event[sessions][${sessionIndex}][room_number]" class="form-control mb-1" placeholder="Room Number">
                            </div>
                            <div class='flex-grow-1 me-2'>
                                <lable> Capacity:</lable>
                                <input type="number" name="event[sessions][${sessionIndex}][capacity]" class="form-control mb-1" placeholder="Capacity">
                            </div>
                        </div>
                        
                        <div id="speakers-container-${sessionIndex}" class="m-3"></div>
                        <button type="button" class="btn btn-secondary add-speaker-btn" data-session-index="${sessionIndex}">Add Speaker</button>
                        <button type="button" class="btn btn-danger remove-session-btn" data-session-index="${sessionIndex}">Remove Session</button>
                    </div>
                    `;
                $('#sessions-container').append(sessionHtml);

                $(`[name="event[sessions][${sessionIndex}][title]"]`).rules("add", {
                    required: true,
                    messages: {
                        required: "Session title is required."
                    }
                });
                $(`[name="event[sessions][${sessionIndex}][start_time]"]`).rules("add", {
                    required: true,
                    messages: {
                        required: "Session start time is required."
                    }
                });
                $(`[name="event[sessions][${sessionIndex}][end_time]"]`).rules("add", {
                    required: true,
                    messages: {
                        required: "Session end time is required."
                    }
                });
                $(`[name="event[sessions][${sessionIndex}][room_number]"]`).rules("add", {
                    required: true,
                    messages: {
                        required: "room number is required."
                    }
                });
                $(`[name="event[sessions][${sessionIndex}][capacity]"]`).rules("add", {
                    required: true,
                    messages: {
                        required: "capacity is required."
                    }
                });

                sessionIndex++;
            });

            $(document).on('click', '.remove-session-btn', function() {
                let sessionIndex = $(this).data('session-index');
                $(`#session-${sessionIndex}`).remove();
            });

            // Initialize speaker index
            $(document).on('click', '.add-speaker-btn', function() {
                let sessionIndex = $(this).data('session-index');
                let speakerIndex = $(`#speakers-container-${sessionIndex} .speaker-block`)
                    .length; // Get the number of existing speakers in the session

                let speakerHtml = `
                    <div class="speaker-block border p-2 mb-2" id="session-${sessionIndex}-speaker-${speakerIndex}">
                        <h5 class='mb-3'>Speaker</h5>
                        <div class="form-group d-flex flex-wrap">
                            <div class='flex-grow-1 me-2'>
                                <label>Name:</label>
                                <input type="text" name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][name]" class="form-control mb-1" placeholder="Speaker Name">
                            </div>
                            <div class='flex-grow-1 me-2'>
                                <label>Bio:</label>
                                <input type="text" name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][bio]" class="form-control mb-1" placeholder="Speaker Bio">
                            </div>
                            <div class='flex-grow-1 me-2'>
                                <label>Presention title:</label>
                                <input type="text" name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][presentation_title]" class="form-control mb-1" placeholder="Presentation Title">
                            </div>
                            <div class='flex-grow-1 me-2'>
                                <label>Email:</label>
                                <input type="email" name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][email]" class="form-control mb-1" placeholder="Speaker Email">
                            </div>

                            <button type="button" style="height: 37px; margin-top: 24px;" class="btn btn-danger btn-sm remove-speaker-btn me-2" data-session-index="${sessionIndex}" data-speaker-index="${speakerIndex}">Remove Speaker</button>
                        </div>
                    </div>
                `;
                $(`#speakers-container-${sessionIndex}`).append(speakerHtml);

                $(`[name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][name]`).rules("add", {
                    required: true,
                    messages: {
                        required: "Speakers name is required."
                    }
                });

                $(`[name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][bio]`).rules("add", {
                    required: true,
                    messages: {
                        required: "Speakers bio is required."
                    }
                });

                $(`[name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][presentation_title]`)
                    .rules("add", {
                        required: true,
                        messages: {
                            required: "Speaker presentation title is required."
                        }
                    });

                $(`[name="event[sessions][${sessionIndex}][speakers][${speakerIndex}][email]`).rules(
                    "add", {
                        required: true,
                        messages: {
                            required: "Speaker email is required."
                        }
                    });

            });

            // Event delegation for removing speakers
            $(document).on('click', '.remove-speaker-btn', function() {
                let sessionIndex = $(this).data('session-index');
                let speakerIndex = $(this).data('speaker-index');
                $(`#session-${sessionIndex}-speaker-${speakerIndex}`).remove();
            });

            $('#event_form').validate({
                rules: {
                    'event.title': {
                        required: true,
                    },
                    'event.description': {
                        required: true,
                    },
                    'event.start_date': {
                        required: true,
                    },
                    'event.end_date': {
                        required: true,
                    },
                    'event.venue': {
                        required: true,
                    },
                    // Add more validation rules for other fields
                },
                messages: {
                    'event.title': {
                        required: "Please enter the event title."
                    },
                    'event.description': {
                        required: "Please enter the event description."
                    },
                    'event.start_date': {
                        required: "please select the date",
                    },
                    'event.end_date': {
                        required: "please select the date",
                    },
                    'event.venue': {
                        required: "please enter vanue",
                    },
                },
                submitHandler: function(form) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('insert_Event') }}",
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: response.message,
                                    text: 'Your event has been added successfully',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                })
                                $('#event_form')[0].reset();
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to add event',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                })
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });

        });
    </script>

</body>

</html>
