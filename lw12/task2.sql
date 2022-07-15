SELECT
    student.surname AS Surname,
    student.name AS Name,
    student.patronymic AS Patronymic,
    class.name AS Class
FROM 
	student
    LEFT JOIN class ON student.class_id = class.id
WHERE
	class.id = 3;