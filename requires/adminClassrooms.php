<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



<section id="classrooms">
    <div class="section-header">
        <h2>Classroom Availability</h2>
        <div class="filter-controls">
            <select id="day-filter">
                <option value="all">All Days</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
            </select>
        </div>
    </div>
    <div class="timetable-container">
        <div class="timetable-header">
            <div class="timetable-cell header-cell">Room</div>
            <div class="timetable-cell header-cell">Monday</div>
            <div class="timetable-cell header-cell">Tuesday</div>
            <div class="timetable-cell header-cell">Wednesday</div>
            <div class="timetable-cell header-cell">Thursday</div>
            <div class="timetable-cell header-cell">Friday</div>
        </div>
        <div id="classroom-timetable" class="timetable-body">

        </div>
    </div>
</section>