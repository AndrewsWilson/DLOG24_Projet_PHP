    SELECT 
         article_title, author_name
    FROM
        articles
    INNER JOIN
        authors ON
        articles.authors_id = authors.id
    ORDER BY
        articles.id DESC
    LIMIT 10;