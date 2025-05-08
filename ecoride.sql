--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4
-- Dumped by pg_dump version 17.4 (Homebrew)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: carpools; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carpools (
    id_carpool integer NOT NULL,
    date_depart date NOT NULL,
    time_depart time without time zone NOT NULL,
    time_arrival time without time zone NOT NULL,
    localisation_depart character varying(255) NOT NULL,
    localisation_arrival character varying(255) NOT NULL,
    remaining_seat integer,
    price integer NOT NULL,
    id_users integer NOT NULL,
    id_status_carpool integer NOT NULL,
    id_car integer NOT NULL
);


ALTER TABLE public.carpools OWNER TO postgres;

--
-- Name: carpools_id_carpool_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.carpools_id_carpool_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.carpools_id_carpool_seq OWNER TO postgres;

--
-- Name: carpools_id_carpool_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.carpools_id_carpool_seq OWNED BY public.carpools.id_carpool;


--
-- Name: carpools_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carpools_users (
    id_users integer NOT NULL,
    id_carpool integer NOT NULL,
    role_in_carpool character varying(255)
);


ALTER TABLE public.carpools_users OWNER TO postgres;

--
-- Name: cars; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cars (
    id_car integer NOT NULL,
    model character varying(255) NOT NULL,
    brand character varying(255) NOT NULL,
    nb_plate character varying(255) NOT NULL,
    id_energy integer NOT NULL,
    color character varying(255) NOT NULL,
    first_regist date NOT NULL,
    seats_nb integer NOT NULL,
    preferences character varying(255),
    id_users integer NOT NULL,
    id_travel_type integer
);


ALTER TABLE public.cars OWNER TO postgres;

--
-- Name: cars_id_car_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cars_id_car_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cars_id_car_seq OWNER TO postgres;

--
-- Name: cars_id_car_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cars_id_car_seq OWNED BY public.cars.id_car;


--
-- Name: contact; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contact (
    id_contact integer NOT NULL,
    title character varying(50) NOT NULL,
    email character varying(255) NOT NULL,
    message character varying(255) NOT NULL,
    date_contact date NOT NULL
);


ALTER TABLE public.contact OWNER TO postgres;

--
-- Name: contact_id_contact_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contact_id_contact_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.contact_id_contact_seq OWNER TO postgres;

--
-- Name: contact_id_contact_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contact_id_contact_seq OWNED BY public.contact.id_contact;


--
-- Name: energies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.energies (
    id_energy integer NOT NULL,
    label_energy character varying(50) DEFAULT NULL::character varying
);


ALTER TABLE public.energies OWNER TO postgres;

--
-- Name: energies_id_energy_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.energies_id_energy_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.energies_id_energy_seq OWNER TO postgres;

--
-- Name: energies_id_energy_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.energies_id_energy_seq OWNED BY public.energies.id_energy;


--
-- Name: profiles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.profiles (
    id_profil integer NOT NULL,
    label_profil character varying(50) NOT NULL
);


ALTER TABLE public.profiles OWNER TO postgres;

--
-- Name: profiles_id_profil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.profiles_id_profil_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.profiles_id_profil_seq OWNER TO postgres;

--
-- Name: profiles_id_profil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.profiles_id_profil_seq OWNED BY public.profiles.id_profil;


--
-- Name: reviews; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reviews (
    id_review integer NOT NULL,
    notes double precision NOT NULL,
    comment character varying(255) NOT NULL,
    id_status_review integer NOT NULL,
    id_carpool integer NOT NULL
);


ALTER TABLE public.reviews OWNER TO postgres;

--
-- Name: reviews_id_review_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reviews_id_review_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.reviews_id_review_seq OWNER TO postgres;

--
-- Name: reviews_id_review_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reviews_id_review_seq OWNED BY public.reviews.id_review;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id_role integer NOT NULL,
    label_role character varying(50) NOT NULL
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_id_role_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_role_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.roles_id_role_seq OWNER TO postgres;

--
-- Name: roles_id_role_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_role_seq OWNED BY public.roles.id_role;


--
-- Name: status_carpool; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_carpool (
    id_status_carpool integer NOT NULL,
    label_status_carpool character varying(50) NOT NULL
);


ALTER TABLE public.status_carpool OWNER TO postgres;

--
-- Name: status_carpool_id_status_carpool_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.status_carpool_id_status_carpool_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.status_carpool_id_status_carpool_seq OWNER TO postgres;

--
-- Name: status_carpool_id_status_carpool_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_carpool_id_status_carpool_seq OWNED BY public.status_carpool.id_status_carpool;


--
-- Name: status_review; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_review (
    id_status_review integer NOT NULL,
    label_status_review character varying(50) NOT NULL
);


ALTER TABLE public.status_review OWNER TO postgres;

--
-- Name: status_review_id_status_review_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.status_review_id_status_review_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.status_review_id_status_review_seq OWNER TO postgres;

--
-- Name: status_review_id_status_review_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_review_id_status_review_seq OWNED BY public.status_review.id_status_review;


--
-- Name: status_session; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_session (
    id_status_session integer NOT NULL,
    label_status_session character varying(50) NOT NULL
);


ALTER TABLE public.status_session OWNER TO postgres;

--
-- Name: status_session_id_status_session_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.status_session_id_status_session_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.status_session_id_status_session_seq OWNER TO postgres;

--
-- Name: status_session_id_status_session_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_session_id_status_session_seq OWNED BY public.status_session.id_status_session;


--
-- Name: travel_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.travel_types (
    id_travel_type integer NOT NULL,
    label_travel_type character varying(50) NOT NULL
);


ALTER TABLE public.travel_types OWNER TO postgres;

--
-- Name: travel_types_id_travel_type_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.travel_types_id_travel_type_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.travel_types_id_travel_type_seq OWNER TO postgres;

--
-- Name: travel_types_id_travel_type_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.travel_types_id_travel_type_seq OWNED BY public.travel_types.id_travel_type;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id_users integer NOT NULL,
    pseudo character varying(50) NOT NULL,
    email character varying(255) NOT NULL,
    password character(60) NOT NULL,
    photo bytea,
    telephone character varying(20),
    address character varying(255),
    lastname character varying(50),
    firstname character varying(50),
    credit integer NOT NULL,
    id_role integer NOT NULL,
    id_profil integer,
    id_status_session integer NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_users_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_users_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_users_seq OWNER TO postgres;

--
-- Name: users_id_users_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_users_seq OWNED BY public.users.id_users;


--
-- Name: carpools id_carpool; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools ALTER COLUMN id_carpool SET DEFAULT nextval('public.carpools_id_carpool_seq'::regclass);


--
-- Name: cars id_car; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars ALTER COLUMN id_car SET DEFAULT nextval('public.cars_id_car_seq'::regclass);


--
-- Name: contact id_contact; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact ALTER COLUMN id_contact SET DEFAULT nextval('public.contact_id_contact_seq'::regclass);


--
-- Name: energies id_energy; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.energies ALTER COLUMN id_energy SET DEFAULT nextval('public.energies_id_energy_seq'::regclass);


--
-- Name: profiles id_profil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profiles ALTER COLUMN id_profil SET DEFAULT nextval('public.profiles_id_profil_seq'::regclass);


--
-- Name: reviews id_review; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews ALTER COLUMN id_review SET DEFAULT nextval('public.reviews_id_review_seq'::regclass);


--
-- Name: roles id_role; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id_role SET DEFAULT nextval('public.roles_id_role_seq'::regclass);


--
-- Name: status_carpool id_status_carpool; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_carpool ALTER COLUMN id_status_carpool SET DEFAULT nextval('public.status_carpool_id_status_carpool_seq'::regclass);


--
-- Name: status_review id_status_review; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_review ALTER COLUMN id_status_review SET DEFAULT nextval('public.status_review_id_status_review_seq'::regclass);


--
-- Name: status_session id_status_session; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_session ALTER COLUMN id_status_session SET DEFAULT nextval('public.status_session_id_status_session_seq'::regclass);


--
-- Name: travel_types id_travel_type; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.travel_types ALTER COLUMN id_travel_type SET DEFAULT nextval('public.travel_types_id_travel_type_seq'::regclass);


--
-- Name: users id_users; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id_users SET DEFAULT nextval('public.users_id_users_seq'::regclass);


--
-- Data for Name: carpools; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.carpools (id_carpool, date_depart, time_depart, time_arrival, localisation_depart, localisation_arrival, remaining_seat, price, id_users, id_status_carpool, id_car) FROM stdin;
2	2025-05-30	11:07:00	15:30:00	Ur	Paris	4	22	4	1	2
\.


--
-- Data for Name: carpools_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.carpools_users (id_users, id_carpool, role_in_carpool) FROM stdin;
\.


--
-- Data for Name: cars; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cars (id_car, model, brand, nb_plate, id_energy, color, first_regist, seats_nb, preferences, id_users, id_travel_type) FROM stdin;
2	Ateca	Seat	FR-267-OT	4	Noir	2024-11-28	4	Non fumeur	4	2
\.


--
-- Data for Name: contact; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contact (id_contact, title, email, message, date_contact) FROM stdin;
\.


--
-- Data for Name: energies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.energies (id_energy, label_energy) FROM stdin;
1	Electrique
2	Hybride
3	Diesel
4	Essence
5	GPL
\.


--
-- Data for Name: profiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.profiles (id_profil, label_profil) FROM stdin;
1	Passager
2	Chauffeur
3	Passager chauffeur
\.


--
-- Data for Name: reviews; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reviews (id_review, notes, comment, id_status_review, id_carpool) FROM stdin;
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id_role, label_role) FROM stdin;
1	admin
2	user
3	employee
\.


--
-- Data for Name: status_carpool; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_carpool (id_status_carpool, label_status_carpool) FROM stdin;
1	Confirmé
2	Annulé
\.


--
-- Data for Name: status_review; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_review (id_status_review, label_status_review) FROM stdin;
1	Validé
2	Refusé
3	En attente
\.


--
-- Data for Name: status_session; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_session (id_status_session, label_status_session) FROM stdin;
1	Actif
2	Suspendu
\.


--
-- Data for Name: travel_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.travel_types (id_travel_type, label_travel_type) FROM stdin;
1	Ecolo
2	Non écolo
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id_users, pseudo, email, password, photo, telephone, address, lastname, firstname, credit, id_role, id_profil, id_status_session) FROM stdin;
4	Test1	un.test@ecoride.com	$2y$12$Yu6WWVhH91acIqA4Hz8ZTejF.NkCchD7lgUmZZ9qDZqyDMOksOD6q	\N	0601010101	Ur	UNICO	Ulysse	20	2	2	1
\.


--
-- Name: carpools_id_carpool_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.carpools_id_carpool_seq', 2, true);


--
-- Name: cars_id_car_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cars_id_car_seq', 2, true);


--
-- Name: contact_id_contact_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contact_id_contact_seq', 1, false);


--
-- Name: energies_id_energy_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.energies_id_energy_seq', 5, true);


--
-- Name: profiles_id_profil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.profiles_id_profil_seq', 3, true);


--
-- Name: reviews_id_review_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reviews_id_review_seq', 5, true);


--
-- Name: roles_id_role_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_role_seq', 3, true);


--
-- Name: status_carpool_id_status_carpool_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_carpool_id_status_carpool_seq', 3, false);


--
-- Name: status_review_id_status_review_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_review_id_status_review_seq', 3, true);


--
-- Name: status_session_id_status_session_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_session_id_status_session_seq', 2, true);


--
-- Name: travel_types_id_travel_type_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.travel_types_id_travel_type_seq', 2, true);


--
-- Name: users_id_users_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_users_seq', 4, true);


--
-- Name: carpools carpools_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT carpools_pkey PRIMARY KEY (id_carpool);


--
-- Name: cars cars_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_pkey PRIMARY KEY (id_car);


--
-- Name: contact contact_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact
    ADD CONSTRAINT contact_pkey PRIMARY KEY (id_contact);


--
-- Name: energies energies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.energies
    ADD CONSTRAINT energies_pkey PRIMARY KEY (id_energy);


--
-- Name: profiles profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profiles
    ADD CONSTRAINT profiles_pkey PRIMARY KEY (id_profil);


--
-- Name: reviews reviews_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews
    ADD CONSTRAINT reviews_pkey PRIMARY KEY (id_review);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_role);


--
-- Name: status_carpool status_carpool_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_carpool
    ADD CONSTRAINT status_carpool_pkey PRIMARY KEY (id_status_carpool);


--
-- Name: status_review status_review_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_review
    ADD CONSTRAINT status_review_pkey PRIMARY KEY (id_status_review);


--
-- Name: status_session status_session_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_session
    ADD CONSTRAINT status_session_pkey PRIMARY KEY (id_status_session);


--
-- Name: travel_types travel_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.travel_types
    ADD CONSTRAINT travel_types_pkey PRIMARY KEY (id_travel_type);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_users);


--
-- Name: carpools fk_id_car; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT fk_id_car FOREIGN KEY (id_car) REFERENCES public.cars(id_car);


--
-- Name: reviews fk_id_carpool; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews
    ADD CONSTRAINT fk_id_carpool FOREIGN KEY (id_carpool) REFERENCES public.carpools(id_carpool);


--
-- Name: carpools_users fk_id_carpool; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools_users
    ADD CONSTRAINT fk_id_carpool FOREIGN KEY (id_carpool) REFERENCES public.carpools(id_carpool);


--
-- Name: cars fk_id_energy; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT fk_id_energy FOREIGN KEY (id_energy) REFERENCES public.energies(id_energy);


--
-- Name: users fk_id_profil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_id_profil FOREIGN KEY (id_profil) REFERENCES public.profiles(id_profil);


--
-- Name: users fk_id_role; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_id_role FOREIGN KEY (id_role) REFERENCES public.roles(id_role);


--
-- Name: carpools fk_id_status_carpool; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT fk_id_status_carpool FOREIGN KEY (id_status_carpool) REFERENCES public.status_carpool(id_status_carpool);


--
-- Name: reviews fk_id_status_review; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews
    ADD CONSTRAINT fk_id_status_review FOREIGN KEY (id_status_review) REFERENCES public.status_review(id_status_review);


--
-- Name: users fk_id_status_session; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_id_status_session FOREIGN KEY (id_status_session) REFERENCES public.status_session(id_status_session);


--
-- Name: cars fk_id_travel_type; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT fk_id_travel_type FOREIGN KEY (id_travel_type) REFERENCES public.travel_types(id_travel_type);


--
-- Name: carpools fk_id_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT fk_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


--
-- Name: cars fk_id_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT fk_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


--
-- Name: carpools_users fk_id_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools_users
    ADD CONSTRAINT fk_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


--
-- PostgreSQL database dump complete
--

