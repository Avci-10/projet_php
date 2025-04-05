<?php
// Include the CSS styles
echo '<link rel="stylesheet" href="../css/admin.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">';

// Mock data for students (can be replaced with a database query)
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newStudent = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'program' => $_POST['program']
    ];
    // Add the new student to the array
    $students[] = $newStudent;
    // Redirect to avoid resubmission on refresh
    header("Location: students.php");
    exit();
}
?>

<section id="students">
    <div class="section-header">
        <h2>Students</h2>
        <!-- Button to toggle the form -->
        <button class="add-btn" onclick="toggleForm()">Add Student</button>
    </div>

    <!-- Form to add a new student -->
    <div id="student-form-container" class="form-container" style="display: none;">
        <h3>Add New Student</h3>
        <form method="POST" class="form-section">
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
                <button type="button" class="cancel-btn" onclick="toggleForm()">Cancel</button>
                <button type="submit" class="submit-btn">Save Student</button>
            </div>
        </form>
    </div>

    <!-- Student List -->
    <div id="students-list" class="list">
        <div class="list-header">
            <div class="list-column">Name</div>
            <div class="list-column">Email</div>
            <div class="list-column">ID</div>
            <div class="list-column">Program</div>
            <div class="list-column">Actions</div>
        </div>
        <div id="students-data" class="list-data">
            <?php foreach ($students as $student): ?>
                <div class="list-item">
                    <div class="list-column"><?php echo htmlspecialchars($student['name']); ?></div>
                    <div class="list-column"><?php echo htmlspecialchars($student['email']); ?></div>
                    <div class="list-column"><?php echo htmlspecialchars($student['id']); ?></div>
                    <div class="list-column"><?php echo htmlspecialchars($student['program']); ?></div>
                    <div class="list-column actions">
                        <button class="action-btn edit-btn" data-id="<?php echo htmlspecialchars($student['id']); ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="action-btn delete-btn" data-id="<?php echo htmlspecialchars($student['id']); ?>">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- JavaScript to toggle the form -->
<script>
    function toggleForm() {
        const formContainer = document.getElementById('student-form-container');
        formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
    }
</script>