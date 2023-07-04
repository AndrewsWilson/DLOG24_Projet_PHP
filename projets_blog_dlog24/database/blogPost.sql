SELECT
    articles.id, title, text, pseudo, start_date
FROM
    articles
INNER JOIN
    authors ON
    articles.authors_id = authors.id
WHERE
    articles.id = :id ;

