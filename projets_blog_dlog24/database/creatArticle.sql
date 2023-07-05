INSERT INTO articles (
    title,
    text,
    start_date,
    end_date,
    degree,
    authors_id
)
VALUES
    (
          :title,
          :text,
          :start_date,
          :end_date,
          :degree,
          :authors_id
    );