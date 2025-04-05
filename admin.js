// Mock data for demonstration
const mockData = {
    students: [
        { id: "STU001", name: "John Smith", email: "john@example.com", program: "Computer Science" },
        { id: "STU002", name: "Jane Doe", email: "jane@example.com", program: "Engineering" },
        { id: "STU003", name: "Mike Johnson", email: "mike@example.com", program: "Business" }
    ],
    instructors: [
        { id: "INS001", name: "Dr. Robert Brown", email: "robert@example.com", department: "Computer Science", courses: 3 },
        { id: "INS002", name: "Prof. Lisa White", email: "lisa@example.com", department: "Engineering", courses: 2 },
        { id: "INS003", name: "Dr. Sarah Miller", email: "sarah@example.com", department: "Business", courses: 4 }
    ],
    classrooms: [
        { name: "Room 101", availability: [false, true, false, true, false] },
        { name: "Room 102", availability: [true, false, true, false, true] },
        { name: "Room 103", availability: [false, false, true, true, false] },
        { name: "Room 104", availability: [true, true, false, false, true] }
    ],
    stats: {
        studentCount: 156,
        instructorCount: 42,
        classroomCount: 18,
        courseCount: 65,
        occupancyRate: 78,
        eventsCount: 12
    }
};

// Load mock data on page load
document.addEventListener('DOMContentLoaded', function() {
    loadStats();
    loadStudents();
    loadInstructors();
    loadClassrooms();
    setupEventListeners();
});

// Load dashboard stats
function loadStats() {
    document.getElementById('student-count').textContent = mockData.stats.studentCount;
    document.getElementById('instructor-count').textContent = mockData.stats.instructorCount;
    document.getElementById('classroom-count').textContent = mockData.stats.classroomCount;
    document.getElementById('course-count').textContent = mockData.stats.courseCount;
    document.getElementById('occupancy-rate').textContent = mockData.stats.occupancyRate + '%';
    document.getElementById('events-count').textContent = mockData.stats.eventsCount;
}

// Load students list


function loadStudents() {
    const studentsData = document.getElementById('students-data');
    studentsData.innerHTML = '';

    mockData.students.forEach(student => {
        const studentItem = document.createElement('div');
        studentItem.className = 'list-item';

        studentsData.appendChild(studentItem);
    });
}

// Load instructors list
function loadInstructors() {
    const instructorsData = document.getElementById('instructors-data');
    instructorsData.innerHTML = '';

    mockData.instructors.forEach(instructor => {
        const instructorItem = document.createElement('div');
        instructorItem.className = 'list-item';
        instructorItem.innerHTML = `
                    <div class="list-column">${instructor.name}</div>
                    <div class="list-column">${instructor.email}</div>
                    <div class="list-column">${instructor.department}</div>
                    <div class="list-column">${instructor.courses}</div>
                    <div class="list-column actions">
                        <button class="action-btn edit-btn" data-id="${instructor.id}"><i class="fas fa-edit"></i></button>
                        <button class="action-btn delete-btn" data-id="${instructor.id}"><i class="fas fa-trash"></i></button>
                    </div>
                `;
        instructorsData.appendChild(instructorItem);
    });
}

// Load classroom availability
function loadClassrooms() {
    const classroomTimetable = document.getElementById('classroom-timetable');
    classroomTimetable.innerHTML = '';

    mockData.classrooms.forEach(classroom => {
        const row = document.createElement('div');
        row.className = 'timetable-row';

        // Room name cell
        const nameCell = document.createElement('div');
        nameCell.className = 'timetable-cell room-cell';
        nameCell.textContent = classroom.name;
        row.appendChild(nameCell);

        // Availability cells
        classroom.availability.forEach(available => {
            const cell = document.createElement('div');
            cell.className = `timetable-cell ${available ? 'available' : 'booked'}`;
            cell.innerHTML = available ? '<span class="status-dot available-dot"></span> Available' :
                '<span class="status-dot booked-dot"></span> Booked';
            row.appendChild(cell);
        });

        classroomTimetable.appendChild(row);
    });
}

// Setup event listeners
function setupEventListeners() {
    // Navigation
    document.querySelectorAll('.sidebar nav a').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelectorAll('.sidebar nav li, .content section').forEach(item => {
                item.classList.remove('active');
            });
            const targetId = e.currentTarget.getAttribute('href').slice(1);
            document.getElementById(targetId).classList.add('active');
            e.currentTarget.parentElement.classList.add('active');
        });
    });

    // Student form toggle
    document.getElementById('add-student-btn').addEventListener('click', () => {
        document.getElementById('student-form-container').style.display = 'block';
        document.getElementById('students-list').style.display = 'none';
    });

    document.getElementById('cancel-student-btn').addEventListener('click', () => {
        document.getElementById('student-form-container').style.display = 'none';
        document.getElementById('students-list').style.display = 'block';
        document.getElementById('studentForm').reset();
    });

    // Instructor form toggle
    document.getElementById('add-instructor-btn').addEventListener('click', () => {
        document.getElementById('instructor-form-container').style.display = 'block';
        document.getElementById('instructors-list').style.display = 'none';
    });

    document.getElementById('cancel-instructor-btn').addEventListener('click', () => {
        document.getElementById('instructor-form-container').style.display = 'none';
        document.getElementById('instructors-list').style.display = 'block';
        document.getElementById('instructorForm').reset();
    });

    // Form submissions
    document.getElementById('studentForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const newStudent = {
            id: formData.get('id'),
            name: formData.get('name'),
            email: formData.get('email'),
            program: formData.get('program')
        };

        // Add to mock data
        mockData.students.push(newStudent);

        // Update UI
        loadStudents();
        document.getElementById('student-form-container').style.display = 'none';
        document.getElementById('students-list').style.display = 'block';
        document.getElementById('studentForm').reset();

        // Update stats
        mockData.stats.studentCount++;
        loadStats();
    });

    document.getElementById('instructorForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const newInstructor = {
            id: 'INS' + (mockData.instructors.length + 1).toString().padStart(3, '0'),
            name: formData.get('name'),
            email: formData.get('email'),
            department: formData.get('department'),
            courses: 0
        };

        // Add to mock data
        mockData.instructors.push(newInstructor);

        // Update UI
        loadInstructors();
        document.getElementById('instructor-form-container').style.display = 'none';
        document.getElementById('instructors-list').style.display = 'block';
        document.getElementById('instructorForm').reset();

        // Update stats
        mockData.stats.instructorCount++;
        loadStats();
    });
}