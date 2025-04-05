<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<section id="instructors">
    <div class="section-header">
        <h2>Instructors</h2>
        <button class="add-btn" id="add-instructor-btn"><i class="fas fa-plus"></i> Add Instructor</button>
    </div>

    <div id="instructor-form-container" class="form-container" style="display: none;">
        <h3>Add New Instructor</h3>
        <form id="instructorForm" class="form-section">
            <div class="form-group">
                <label for="instructor-name">Full Name</label>
                <input type="text" id="instructor-name" name="name" placeholder="Instructor Name" required>
            </div>
            <div class="form-group">
                <label for="instructor-email">Email Address</label>
                <input type="email" id="instructor-email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="instructor-dept">Department</label>
                <select id="instructor-dept" name="department" required>
                    <option value="">Select Department</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Business">Business</option>
                    <option value="Arts">Arts</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn" id="cancel-instructor-btn">Cancel</button>
                <button type="submit" class="submit-btn">Save Instructor</button>
            </div>
        </form>
    </div>

    <div id="instructors-list" class="list">
        <div class="list-header">
            <div class="list-column">Name</div>
            <div class="list-column">Email</div>
            <div class="list-column">Department</div>
            <div class="list-column">Courses</div>
            <div class="list-column">Actions</div>
        </div>
        <div id="instructors-data" class="list-data">
            <!-- Instructor data will be loaded here dynamically -->
        </div>
    </div>
</section>
