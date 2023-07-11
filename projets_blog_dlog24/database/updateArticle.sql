UPDATE articles
SET
    title = :title,
    text = :text,
    start_date = :start_date,
    end_date = :end_date,
    degree = :degree

WHERE
        id = :id;