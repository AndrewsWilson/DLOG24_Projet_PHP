SELECT
    text, date, pseudo
FROM
    comments
    INNER JOIN
    authors ON
    comments.authors_id = authors.id
WHERE
    articles_id = :id;