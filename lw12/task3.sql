SELECT
    student.surname AS Surname,
    student.name AS Name,
    student.patronymic AS Patronymic,
    faculty.name AS Faculty
FROM 
    student
    LEFT JOIN class ON student.class_id = class.id
    LEFT JOIN faculty ON faculty.id = class.faculty_id
WHERE
    faculty.id = 1;