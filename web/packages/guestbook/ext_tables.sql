CREATE TABLE tx_guestbook_domain_model_guest
(
    first_name VARCHAR(255) DEFAULT '' NOT NULL,
    last_name  VARCHAR(255) DEFAULT '' NOT NULL,
    email      VARCHAR(255) DEFAULT '' NOT NULL,
);

CREATE TABLE tx_guestbook_domain_model_comment
(
    headline text     DEFAULT '' NOT NULL,
    comment  longtext DEFAULT '' NOT NULL,
    rating   int(11) DEFAULT 0 NOT NULL,
);