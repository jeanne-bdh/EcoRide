--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4
-- Dumped by pg_dump version 17.0

-- Started on 2025-05-22 17:05:30 CEST

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
-- TOC entry 236 (class 1259 OID 17028)
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
-- TOC entry 235 (class 1259 OID 17027)
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
-- TOC entry 3841 (class 0 OID 0)
-- Dependencies: 235
-- Name: carpools_id_carpool_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.carpools_id_carpool_seq OWNED BY public.carpools.id_carpool;


--
-- TOC entry 241 (class 1259 OID 17108)
-- Name: carpools_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carpools_users (
    id_users integer NOT NULL,
    id_carpool integer NOT NULL,
    role_in_carpool character varying(255)
);


ALTER TABLE public.carpools_users OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 17037)
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
    id_travel_type integer,
    smoker character varying(3) NOT NULL,
    animal character varying(3) NOT NULL
);


ALTER TABLE public.cars OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 17036)
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
-- TOC entry 3842 (class 0 OID 0)
-- Dependencies: 237
-- Name: cars_id_car_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cars_id_car_seq OWNED BY public.cars.id_car;


--
-- TOC entry 218 (class 1259 OID 16960)
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
-- TOC entry 217 (class 1259 OID 16959)
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
-- TOC entry 3843 (class 0 OID 0)
-- Dependencies: 217
-- Name: contact_id_contact_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contact_id_contact_seq OWNED BY public.contact.id_contact;


--
-- TOC entry 220 (class 1259 OID 16969)
-- Name: energies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.energies (
    id_energy integer NOT NULL,
    label_energy character varying(50) DEFAULT NULL::character varying
);


ALTER TABLE public.energies OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16968)
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
-- TOC entry 3844 (class 0 OID 0)
-- Dependencies: 219
-- Name: energies_id_energy_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.energies_id_energy_seq OWNED BY public.energies.id_energy;


--
-- TOC entry 222 (class 1259 OID 16977)
-- Name: profiles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.profiles (
    id_profil integer NOT NULL,
    label_profil character varying(50) NOT NULL
);


ALTER TABLE public.profiles OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16976)
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
-- TOC entry 3845 (class 0 OID 0)
-- Dependencies: 221
-- Name: profiles_id_profil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.profiles_id_profil_seq OWNED BY public.profiles.id_profil;


--
-- TOC entry 240 (class 1259 OID 17046)
-- Name: reviews; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reviews (
    id_review integer NOT NULL,
    notes double precision NOT NULL,
    comment character varying(255) NOT NULL,
    id_status_review integer NOT NULL,
    id_carpool integer NOT NULL,
    title character varying(50)
);


ALTER TABLE public.reviews OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 17045)
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
-- TOC entry 3846 (class 0 OID 0)
-- Dependencies: 239
-- Name: reviews_id_review_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reviews_id_review_seq OWNED BY public.reviews.id_review;


--
-- TOC entry 224 (class 1259 OID 16984)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id_role integer NOT NULL,
    label_role character varying(50) NOT NULL
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16983)
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
-- TOC entry 3847 (class 0 OID 0)
-- Dependencies: 223
-- Name: roles_id_role_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_role_seq OWNED BY public.roles.id_role;


--
-- TOC entry 226 (class 1259 OID 16991)
-- Name: status_carpool; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_carpool (
    id_status_carpool integer NOT NULL,
    label_status_carpool character varying(50) NOT NULL
);


ALTER TABLE public.status_carpool OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 16990)
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
-- TOC entry 3848 (class 0 OID 0)
-- Dependencies: 225
-- Name: status_carpool_id_status_carpool_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_carpool_id_status_carpool_seq OWNED BY public.status_carpool.id_status_carpool;


--
-- TOC entry 228 (class 1259 OID 16998)
-- Name: status_review; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_review (
    id_status_review integer NOT NULL,
    label_status_review character varying(50) NOT NULL
);


ALTER TABLE public.status_review OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 16997)
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
-- TOC entry 3849 (class 0 OID 0)
-- Dependencies: 227
-- Name: status_review_id_status_review_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_review_id_status_review_seq OWNED BY public.status_review.id_status_review;


--
-- TOC entry 230 (class 1259 OID 17005)
-- Name: status_session; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_session (
    id_status_session integer NOT NULL,
    label_status_session character varying(50) NOT NULL
);


ALTER TABLE public.status_session OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 17004)
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
-- TOC entry 3850 (class 0 OID 0)
-- Dependencies: 229
-- Name: status_session_id_status_session_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_session_id_status_session_seq OWNED BY public.status_session.id_status_session;


--
-- TOC entry 232 (class 1259 OID 17012)
-- Name: travel_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.travel_types (
    id_travel_type integer NOT NULL,
    label_travel_type character varying(50) NOT NULL
);


ALTER TABLE public.travel_types OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 17011)
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
-- TOC entry 3851 (class 0 OID 0)
-- Dependencies: 231
-- Name: travel_types_id_travel_type_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.travel_types_id_travel_type_seq OWNED BY public.travel_types.id_travel_type;


--
-- TOC entry 234 (class 1259 OID 17019)
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
-- TOC entry 233 (class 1259 OID 17018)
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
-- TOC entry 3852 (class 0 OID 0)
-- Dependencies: 233
-- Name: users_id_users_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_users_seq OWNED BY public.users.id_users;


--
-- TOC entry 3626 (class 2604 OID 17031)
-- Name: carpools id_carpool; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools ALTER COLUMN id_carpool SET DEFAULT nextval('public.carpools_id_carpool_seq'::regclass);


--
-- TOC entry 3627 (class 2604 OID 17040)
-- Name: cars id_car; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars ALTER COLUMN id_car SET DEFAULT nextval('public.cars_id_car_seq'::regclass);


--
-- TOC entry 3616 (class 2604 OID 16963)
-- Name: contact id_contact; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact ALTER COLUMN id_contact SET DEFAULT nextval('public.contact_id_contact_seq'::regclass);


--
-- TOC entry 3617 (class 2604 OID 16972)
-- Name: energies id_energy; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.energies ALTER COLUMN id_energy SET DEFAULT nextval('public.energies_id_energy_seq'::regclass);


--
-- TOC entry 3619 (class 2604 OID 16980)
-- Name: profiles id_profil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profiles ALTER COLUMN id_profil SET DEFAULT nextval('public.profiles_id_profil_seq'::regclass);


--
-- TOC entry 3628 (class 2604 OID 17049)
-- Name: reviews id_review; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews ALTER COLUMN id_review SET DEFAULT nextval('public.reviews_id_review_seq'::regclass);


--
-- TOC entry 3620 (class 2604 OID 16987)
-- Name: roles id_role; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id_role SET DEFAULT nextval('public.roles_id_role_seq'::regclass);


--
-- TOC entry 3621 (class 2604 OID 16994)
-- Name: status_carpool id_status_carpool; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_carpool ALTER COLUMN id_status_carpool SET DEFAULT nextval('public.status_carpool_id_status_carpool_seq'::regclass);


--
-- TOC entry 3622 (class 2604 OID 17001)
-- Name: status_review id_status_review; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_review ALTER COLUMN id_status_review SET DEFAULT nextval('public.status_review_id_status_review_seq'::regclass);


--
-- TOC entry 3623 (class 2604 OID 17008)
-- Name: status_session id_status_session; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_session ALTER COLUMN id_status_session SET DEFAULT nextval('public.status_session_id_status_session_seq'::regclass);


--
-- TOC entry 3624 (class 2604 OID 17015)
-- Name: travel_types id_travel_type; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.travel_types ALTER COLUMN id_travel_type SET DEFAULT nextval('public.travel_types_id_travel_type_seq'::regclass);


--
-- TOC entry 3625 (class 2604 OID 17022)
-- Name: users id_users; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id_users SET DEFAULT nextval('public.users_id_users_seq'::regclass);


--
-- TOC entry 3830 (class 0 OID 17028)
-- Dependencies: 236
-- Data for Name: carpools; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.carpools (id_carpool, date_depart, time_depart, time_arrival, localisation_depart, localisation_arrival, remaining_seat, price, id_users, id_status_carpool, id_car) FROM stdin;
3	2025-05-14	08:00:00	11:30:00	Lyon	Marseille	4	22	4	1	2
25	2025-05-23	08:00:00	11:30:00	Lyon	Marseille	4	25	4	4	2
4	2025-05-17	09:00:00	11:00:00	Paris	Bourg-en-Bresse	4	18	4	4	2
23	2025-05-30	17:00:00	19:30:00	Bourges	Orléans	4	8	4	4	2
26	2025-05-25	17:45:00	20:00:00	Paris	Lille	4	18	4	4	2
7	2025-05-20	08:30:00	18:30:00	Aix-en-Provence	Boulogne-Billancourt	4	25	4	1	2
8	2025-04-10	08:00:00	10:30:00	Lyon	Grenoble	2	12	4	1	2
9	2025-04-15	14:00:00	17:30:00	Marseille	Avignon	1	15	4	1	2
11	2025-04-25	07:30:00	09:00:00	Nantes	Rennes	3	10	4	1	2
12	2025-03-10	08:00:00	15:30:00	Bourg-en-bresse	Aix-en-Provence	2	12	4	1	2
13	2025-04-10	08:00:00	10:30:00	Lyon	Grenoble	2	12	7	1	3
14	2025-04-15	14:00:00	17:30:00	Marseille	Avignon	1	15	7	1	3
15	2025-04-20	18:00:00	21:00:00	Bordeaux	Toulouse	0	20	7	2	3
16	2025-05-20	08:30:00	10:30:00	Paris	Lyon	4	25	7	1	3
17	2025-06-10	14:00:00	16:30:00	Marseille	Nice	4	18	7	1	3
18	2025-07-01	09:00:00	12:00:00	Bordeaux	Toulouse	4	30	7	1	3
19	2025-08-15	17:00:00	19:00:00	Nantes	Rennes	4	15	7	1	3
22	2025-03-12	18:00:00	20:00:00	Lyon	Grenoble	2	20	4	1	2
24	2025-07-03	18:00:00	20:00:00	Aix-les-bains	Evian-les-bains	4	12	4	4	2
5	2025-07-17	09:00:00	10:45:00	Nice	Cannes	4	12	4	4	2
6	2025-07-20	10:00:00	11:30:00	Sète	Montpellier	4	10	4	4	2
2	2025-05-30	11:07:00	15:30:00	Ur	Paris	4	22	4	2	2
21	2025-06-25	10:00:00	12:30:00	Paris	Lille	4	28	4	2	2
1	2025-05-16	06:30:00	09:00:00	Lille	Bordeaux	4	10	4	3	2
31	2025-06-01	11:00:00	12:16:00	Paris	Amiens	4	8	7	1	3
32	2025-06-05	10:00:00	11:45:00	Lille	Bruxelles	4	10	7	1	3
10	2025-04-20	18:00:00	21:00:00	Bordeaux	Toulouse	0	20	4	1	2
28	2025-05-30	09:00:00	10:45:00	Nantes	Rennes	4	12	4	1	2
29	2025-05-31	13:30:00	15:00:00	Strasbourg	Nancy	4	14	4	1	2
33	2025-09-05	10:00:00	11:45:00	Lille	Bruxelles	4	10	10	1	5
20	2025-09-05	07:45:00	10:15:00	Lille	Bruxelles	0	22	7	1	3
27	2025-05-28	14:15:00	16:30:00	Bordeaux	Toulouse	4	15	4	1	2
30	2025-06-20	07:30:00	10:45:00	Annemasse	Doussard	4	13	4	1	2
\.


--
-- TOC entry 3835 (class 0 OID 17108)
-- Dependencies: 241
-- Data for Name: carpools_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.carpools_users (id_users, id_carpool, role_in_carpool) FROM stdin;
4	8	chauffeur
4	10	chauffeur
4	11	chauffeur
4	12	chauffeur
4	9	chauffeur
5	9	passager
6	9	passager
5	10	passager
6	10	passager
5	11	passager
6	11	passager
5	12	passager
6	12	passager
5	8	passager
6	8	passager
7	13	chauffeur
7	14	chauffeur
7	15	chauffeur
5	13	passager
6	14	passager
5	15	passager
4	21	chauffeur
7	21	passager
7	16	chauffeur
7	17	chauffeur
7	18	chauffeur
7	19	chauffeur
7	20	chauffeur
4	22	chauffeur
7	22	passager
4	2	chauffeur
7	2	passager
6	2	passager
4	1	Chauffeur
4	4	Chauffeur
4	5	Chauffeur
4	6	Chauffeur
4	23	Chauffeur
4	24	Chauffeur
4	8	chauffeur
4	10	chauffeur
4	11	chauffeur
4	12	chauffeur
4	9	chauffeur
5	9	passager
6	9	passager
5	10	passager
6	10	passager
5	11	passager
6	11	passager
5	12	passager
6	12	passager
5	8	passager
6	8	passager
7	13	chauffeur
7	14	chauffeur
7	15	chauffeur
5	13	passager
6	14	passager
5	15	passager
4	21	chauffeur
7	21	passager
7	16	chauffeur
7	17	chauffeur
7	18	chauffeur
7	19	chauffeur
7	20	chauffeur
4	22	chauffeur
7	22	passager
4	2	chauffeur
7	2	passager
6	2	passager
4	1	Chauffeur
4	4	Chauffeur
4	5	Chauffeur
4	6	Chauffeur
4	23	Chauffeur
4	24	Chauffeur
4	25	Chauffeur
4	26	Chauffeur
4	27	Chauffeur
4	28	Chauffeur
4	29	Chauffeur
4	30	Chauffeur
7	31	Chauffeur
7	32	Chauffeur
10	33	Chauffeur
4	8	chauffeur
4	10	chauffeur
4	11	chauffeur
4	12	chauffeur
4	9	chauffeur
5	9	passager
6	9	passager
5	10	passager
6	10	passager
5	11	passager
6	11	passager
5	12	passager
6	12	passager
5	8	passager
6	8	passager
7	13	chauffeur
7	14	chauffeur
7	15	chauffeur
5	13	passager
6	14	passager
5	15	passager
4	21	chauffeur
7	21	passager
7	16	chauffeur
7	17	chauffeur
7	18	chauffeur
7	19	chauffeur
7	20	chauffeur
4	22	chauffeur
7	22	passager
4	2	chauffeur
7	2	passager
6	2	passager
4	1	Chauffeur
4	4	Chauffeur
4	5	Chauffeur
4	6	Chauffeur
4	23	Chauffeur
4	24	Chauffeur
4	8	chauffeur
4	10	chauffeur
4	11	chauffeur
4	12	chauffeur
4	9	chauffeur
5	9	passager
6	9	passager
5	10	passager
6	10	passager
5	11	passager
6	11	passager
5	12	passager
6	12	passager
5	8	passager
6	8	passager
7	13	chauffeur
7	14	chauffeur
7	15	chauffeur
5	13	passager
6	14	passager
5	15	passager
4	21	chauffeur
7	21	passager
7	16	chauffeur
7	17	chauffeur
7	18	chauffeur
7	19	chauffeur
7	20	chauffeur
4	22	chauffeur
7	22	passager
4	2	chauffeur
7	2	passager
6	2	passager
4	1	Chauffeur
4	4	Chauffeur
4	5	Chauffeur
4	6	Chauffeur
4	23	Chauffeur
4	24	Chauffeur
4	25	Chauffeur
4	26	Chauffeur
4	27	Chauffeur
4	28	Chauffeur
4	29	Chauffeur
4	30	Chauffeur
7	31	Chauffeur
7	32	Chauffeur
10	33	Chauffeur
\.


--
-- TOC entry 3832 (class 0 OID 17037)
-- Dependencies: 238
-- Data for Name: cars; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cars (id_car, model, brand, nb_plate, id_energy, color, first_regist, seats_nb, preferences, id_users, id_travel_type, smoker, animal) FROM stdin;
2	Ateca	Seat	FR-267-OT	4	Noir	2024-11-28	4	Sans musique	4	2	Non	Oui
4	Zoe	Renault	PO-498-TY	4	Blanche	2025-02-01	3		9	2	Oui	Non
5	Spring	Dacia	HT-343-KL	1	Gris	2025-01-22	4	Parler de tout et de rien	10	1	Non	Non
3	5008	Peugeot	JE-107-KB	3	Bleu	2023-12-14	4	Music	7	2	Oui	Oui
\.


--
-- TOC entry 3812 (class 0 OID 16960)
-- Dependencies: 218
-- Data for Name: contact; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contact (id_contact, title, email, message, date_contact) FROM stdin;
\.


--
-- TOC entry 3814 (class 0 OID 16969)
-- Dependencies: 220
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
-- TOC entry 3816 (class 0 OID 16977)
-- Dependencies: 222
-- Data for Name: profiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.profiles (id_profil, label_profil) FROM stdin;
1	Passager
2	Chauffeur
3	Passager chauffeur
\.


--
-- TOC entry 3834 (class 0 OID 17046)
-- Dependencies: 240
-- Data for Name: reviews; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reviews (id_review, notes, comment, id_status_review, id_carpool, title) FROM stdin;
6	5	Chauffeur très ponctuel et trajet agréable.	1	8	Trajet agréable et conducteur ponctuel
7	4	Bonne ambiance, juste un peu de retard au départ.	1	9	Très bonne ambiance à bord !
8	5	Véhicule propre, chauffeur sympathique.	1	10	Conduite sûre et discussion sympa
9	3	Trajet correct, mais musique trop forte pendant le voyage.	1	11	Voiture propre et trajet fluide
10	4	Communication fluide, je referai un trajet avec lui.	1	12	Ponctuel et très sympathique
11	4	Voyage agréable, chauffeur ponctuel et voiture confortable.	1	13	Super expérience, à refaire !
12	5	Excellente expérience, tout était parfait !	1	14	Covoiturage sans souci, merci !
13	3	Covoiturage correct, mais trop de retard à l’arrivée.	1	15	Tout s’est bien passé, je recommande
14	5	Très bon trajet, conducteur ponctuel et sympathique.	1	20	Chauffeur attentionné et bienveillant
15	3	Trajet correct, mais un peu de retard au départ.	1	20	Bonne communication avant le départ
\.


--
-- TOC entry 3818 (class 0 OID 16984)
-- Dependencies: 224
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id_role, label_role) FROM stdin;
1	admin
2	user
3	employee
\.


--
-- TOC entry 3820 (class 0 OID 16991)
-- Dependencies: 226
-- Data for Name: status_carpool; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_carpool (id_status_carpool, label_status_carpool) FROM stdin;
1	Confirmé
2	Annulé
3	Démarré
4	Terminé
5	Litige
\.


--
-- TOC entry 3822 (class 0 OID 16998)
-- Dependencies: 228
-- Data for Name: status_review; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_review (id_status_review, label_status_review) FROM stdin;
1	Validé
2	Refusé
3	En attente
\.


--
-- TOC entry 3824 (class 0 OID 17005)
-- Dependencies: 230
-- Data for Name: status_session; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_session (id_status_session, label_status_session) FROM stdin;
1	Actif
2	Suspendu
\.


--
-- TOC entry 3826 (class 0 OID 17012)
-- Dependencies: 232
-- Data for Name: travel_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.travel_types (id_travel_type, label_travel_type) FROM stdin;
1	Ecolo
2	Non écolo
\.


--
-- TOC entry 3828 (class 0 OID 17019)
-- Dependencies: 234
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id_users, pseudo, email, password, photo, telephone, address, lastname, firstname, credit, id_role, id_profil, id_status_session) FROM stdin;
9	shadow	shadow.wolf99@example.com	$2y$12$u.wBqf7PlRJbGzcmX3hk5u3t9BKlu5XjMburaiHeUZ2QQ9caMO6Lq	\N	0655667788	Saint-Etienne	SHADOW	Simon	20	2	3	1
2	LuckyLuke	luke.l@example.com	$2y$12$1IkEFNSnQ.glqyuaPOsBbeMYEE9m7XiXpqHPZIPS05IrkFAFA3Ary	\N	\N	\N	\N	\N	0	3	\N	1
1	admin	admin@ecoride.com	$2y$12$ryLXH7m36JnwRjycS3hayutCyOrF5nW6QmK5SuM9fZQzeQY3gfG.m	\N	\N	\N	\N	\N	0	1	\N	1
5	Test2	deux.test@ecoride.com	$2y$12$2irF7.1D3r7Bt9Q/iiF6xOWYESQYIdoxt87bkYYtluY1F3Xw16gqC	\N	0602020202	Douai	DURAND	David	20	2	1	1
4	Test1	un.test@ecoride.com	$2y$12$Yu6WWVhH91acIqA4Hz8ZTejF.NkCchD7lgUmZZ9qDZqyDMOksOD6q	\N	0601010122	Annecy	UNICO	Ulysse	20	2	2	1
6	Test3	trois.test@ecoride.com	$2y$12$sLQAHzMqEQCqlTEBGl/EuuZr7riKtGtc7CBFhJnJIeyrMp5XpNEO.	\N	0603030303	Tours	TRAVERS	Thibault	20	2	1	1
3	jdupont	j.dupont@email.com	$2y$12$BnYYb/9guYj0OkJo7R0FRuiiM3.DKYaYivQ8CNHxfx49RU9X//Tvm	\N	0623456789	Paris	DUPONT	Jeanne	20	2	1	1
7	Test4	quatre.test@ecoride.com	$2y$12$bIePKr0vJMvXNicQYALAAuVrjKZx4ucB.OJ3z3XfoMekd4VCHdJ6y	\N	0604040404	Quimper	QUEEN	Quentin	20	2	3	1
8	skywalker42	skywalker42@example.com	$2y$12$CJAcGmDe7DlnrtoYK7jS/.dA1BnW4gIUm.idufpQQ6S.zmQs3fKsq	\N		Sète	SKYWALKER	Luke	20	2	1	1
10	Test5	cinq.test@ecoride.com	$2y$12$M5nrIVqSOXH8Ia5Jh8ZWTOW3JjSy91gh6H0CCv6n2EsPbufF/GNEe	\N	0644556677	Caen	CINQ	Cédric	20	2	2	1
\.


--
-- TOC entry 3853 (class 0 OID 0)
-- Dependencies: 235
-- Name: carpools_id_carpool_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.carpools_id_carpool_seq', 33, true);


--
-- TOC entry 3854 (class 0 OID 0)
-- Dependencies: 237
-- Name: cars_id_car_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cars_id_car_seq', 5, true);


--
-- TOC entry 3855 (class 0 OID 0)
-- Dependencies: 217
-- Name: contact_id_contact_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contact_id_contact_seq', 1, false);


--
-- TOC entry 3856 (class 0 OID 0)
-- Dependencies: 219
-- Name: energies_id_energy_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.energies_id_energy_seq', 5, true);


--
-- TOC entry 3857 (class 0 OID 0)
-- Dependencies: 221
-- Name: profiles_id_profil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.profiles_id_profil_seq', 3, true);


--
-- TOC entry 3858 (class 0 OID 0)
-- Dependencies: 239
-- Name: reviews_id_review_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reviews_id_review_seq', 15, true);


--
-- TOC entry 3859 (class 0 OID 0)
-- Dependencies: 223
-- Name: roles_id_role_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_role_seq', 3, true);


--
-- TOC entry 3860 (class 0 OID 0)
-- Dependencies: 225
-- Name: status_carpool_id_status_carpool_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_carpool_id_status_carpool_seq', 5, true);


--
-- TOC entry 3861 (class 0 OID 0)
-- Dependencies: 227
-- Name: status_review_id_status_review_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_review_id_status_review_seq', 3, true);


--
-- TOC entry 3862 (class 0 OID 0)
-- Dependencies: 229
-- Name: status_session_id_status_session_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_session_id_status_session_seq', 2, true);


--
-- TOC entry 3863 (class 0 OID 0)
-- Dependencies: 231
-- Name: travel_types_id_travel_type_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.travel_types_id_travel_type_seq', 2, true);


--
-- TOC entry 3864 (class 0 OID 0)
-- Dependencies: 233
-- Name: users_id_users_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_users_seq', 10, true);


--
-- TOC entry 3648 (class 2606 OID 17035)
-- Name: carpools carpools_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT carpools_pkey PRIMARY KEY (id_carpool);


--
-- TOC entry 3650 (class 2606 OID 17044)
-- Name: cars cars_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT cars_pkey PRIMARY KEY (id_car);


--
-- TOC entry 3630 (class 2606 OID 16967)
-- Name: contact contact_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact
    ADD CONSTRAINT contact_pkey PRIMARY KEY (id_contact);


--
-- TOC entry 3632 (class 2606 OID 16975)
-- Name: energies energies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.energies
    ADD CONSTRAINT energies_pkey PRIMARY KEY (id_energy);


--
-- TOC entry 3634 (class 2606 OID 16982)
-- Name: profiles profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profiles
    ADD CONSTRAINT profiles_pkey PRIMARY KEY (id_profil);


--
-- TOC entry 3652 (class 2606 OID 17051)
-- Name: reviews reviews_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews
    ADD CONSTRAINT reviews_pkey PRIMARY KEY (id_review);


--
-- TOC entry 3636 (class 2606 OID 16989)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_role);


--
-- TOC entry 3638 (class 2606 OID 16996)
-- Name: status_carpool status_carpool_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_carpool
    ADD CONSTRAINT status_carpool_pkey PRIMARY KEY (id_status_carpool);


--
-- TOC entry 3640 (class 2606 OID 17003)
-- Name: status_review status_review_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_review
    ADD CONSTRAINT status_review_pkey PRIMARY KEY (id_status_review);


--
-- TOC entry 3642 (class 2606 OID 17010)
-- Name: status_session status_session_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_session
    ADD CONSTRAINT status_session_pkey PRIMARY KEY (id_status_session);


--
-- TOC entry 3644 (class 2606 OID 17017)
-- Name: travel_types travel_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.travel_types
    ADD CONSTRAINT travel_types_pkey PRIMARY KEY (id_travel_type);


--
-- TOC entry 3646 (class 2606 OID 17026)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_users);


--
-- TOC entry 3656 (class 2606 OID 17103)
-- Name: carpools fk_id_car; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT fk_id_car FOREIGN KEY (id_car) REFERENCES public.cars(id_car);


--
-- TOC entry 3662 (class 2606 OID 17092)
-- Name: reviews fk_id_carpool; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews
    ADD CONSTRAINT fk_id_carpool FOREIGN KEY (id_carpool) REFERENCES public.carpools(id_carpool);


--
-- TOC entry 3664 (class 2606 OID 17116)
-- Name: carpools_users fk_id_carpool; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools_users
    ADD CONSTRAINT fk_id_carpool FOREIGN KEY (id_carpool) REFERENCES public.carpools(id_carpool);


--
-- TOC entry 3659 (class 2606 OID 17087)
-- Name: cars fk_id_energy; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT fk_id_energy FOREIGN KEY (id_energy) REFERENCES public.energies(id_energy);


--
-- TOC entry 3653 (class 2606 OID 17057)
-- Name: users fk_id_profil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_id_profil FOREIGN KEY (id_profil) REFERENCES public.profiles(id_profil);


--
-- TOC entry 3654 (class 2606 OID 17052)
-- Name: users fk_id_role; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_id_role FOREIGN KEY (id_role) REFERENCES public.roles(id_role);


--
-- TOC entry 3657 (class 2606 OID 17072)
-- Name: carpools fk_id_status_carpool; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT fk_id_status_carpool FOREIGN KEY (id_status_carpool) REFERENCES public.status_carpool(id_status_carpool);


--
-- TOC entry 3663 (class 2606 OID 17097)
-- Name: reviews fk_id_status_review; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews
    ADD CONSTRAINT fk_id_status_review FOREIGN KEY (id_status_review) REFERENCES public.status_review(id_status_review);


--
-- TOC entry 3655 (class 2606 OID 17062)
-- Name: users fk_id_status_session; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_id_status_session FOREIGN KEY (id_status_session) REFERENCES public.status_session(id_status_session);


--
-- TOC entry 3660 (class 2606 OID 17082)
-- Name: cars fk_id_travel_type; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT fk_id_travel_type FOREIGN KEY (id_travel_type) REFERENCES public.travel_types(id_travel_type);


--
-- TOC entry 3658 (class 2606 OID 17067)
-- Name: carpools fk_id_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools
    ADD CONSTRAINT fk_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


--
-- TOC entry 3661 (class 2606 OID 17077)
-- Name: cars fk_id_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cars
    ADD CONSTRAINT fk_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


--
-- TOC entry 3665 (class 2606 OID 17111)
-- Name: carpools_users fk_id_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carpools_users
    ADD CONSTRAINT fk_id_users FOREIGN KEY (id_users) REFERENCES public.users(id_users);


-- Completed on 2025-05-22 17:05:30 CEST

--
-- PostgreSQL database dump complete
--

