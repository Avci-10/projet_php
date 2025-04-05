 <link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?php


$students = [
    [
        'id' => 'STU001',
        'name' => 'John Smith',
        'email' => 'john@example.com',
        'program' => 'Computer Science'
    ],
    [
        'id' => 'STU002',
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'program' => 'Engineering'
    ],
    [
        'id' => 'STU003',
        'name' => 'Mike Johnson',
        'email' => 'mike@example.com',
        'program' => 'Business'
    ]
];

?>


<section id="students">
    <div class="section-header">
        <h2>Students</h2>
        <button class="add-btn" id="add-student-btn"><i class="fas fa-plus"></i> Add Student</button>
    </div>

    <div id="student-form-container" class="form-container" style="display: none;">
        <h3>Add New Student</h3>
        <form id="studentForm" class="form-section">
            <div class="form-group">
                <label for="student-name">Full Name</label>
                <input type="text" id="student-name" name="name" placeholder="Student Name" required>
            </div>
            <div class="form-group">
                <label for="student-email">Email Address</label>
                <input type="email" id="student-email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="student-id">Student ID</label>
                <input type="text" id="student-id" name="id" placeholder="Student ID" required>
            </div>
            <div class="form-group">
                <label for="student-program">Program</label>
                <select id="student-program" name="program" required>
                    <option value="">Select Program</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Business">Business</option>
                    <option value="Arts">Arts</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn" id="cancel-student-btn">Cancel</button>
                <button type="submit" class="submit-btn">Save Student</button>
            </div>
        </form>
    </div>

    <div id="students-list" class="list">
        <div class="list-header">
            <div class="list-column">Name</div>
            <div class="list-column">Email</div>
            <div class="list-column">ID</div>
            <div class="list-column">Program</div>
            <div class="list-column">Actions</div>
        </div>
        <div id="students-data" class="list-data">

        </div>
    </div>
</section>