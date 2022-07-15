SELECT
    student.surname AS Surname,
    student.name AS Name,
    student.patronymic AS Patronymic,
    student.age AS Age,
    class.name AS Class
FROM 
	student
    LEFT JOIN class ON student.class_id = class.id
WHERE
	student.age = 19;