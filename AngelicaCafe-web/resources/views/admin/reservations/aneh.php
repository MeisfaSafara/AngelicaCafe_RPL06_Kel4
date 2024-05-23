
<div class="mb-4">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="tel_number" id="tel_number" value="{{ $reservation->tel_number }}"
                                required class="mt-1 block w-full form-input">
                        </div>

                        <div class="mb-4">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                            <input type="date" name="res_date" id="res_date" value="{{ $reservation->res_date }}" required
                                class="mt-1 block w-full form-input">
                        </div>

                        <div class="mb-4">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="time" name="start_time" id="start_time" value="{{ $reservation->start_time }}"
                                required class="mt-1 block w-full form-input">
                        </div>

                        <div class="mb-4">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="time" name="end_time" id="end_time" value="{{ $reservation->end_time }}" required
                                class="mt-1 block w-full form-input">
                        </div>

                        <div class="mb-4">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                            <input type="number" name="guest_number" id="guest_number" value="{{ $reservation->guest_number }}"
                                required class="mt-1 block w-full form-input">
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" id="location" value="{{ $reservation->location }}" required
                                class="mt-1 block w-full form-input">
                        </div>

                        <div class="mb-4">
                            <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                            <input type="text" name="venue" id="venue" value="{{ $reservation->venue }}" required
                                class="mt-1 block w-full form-input">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full form-select">
                                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>