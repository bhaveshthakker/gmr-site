use gmr;
alter table applicants modify password varchar(256) NOT NULL DEFAULT 'NOTHING_OF_RELEVANT';
alter table applicants modify activation_key varchar(512) NULL;
