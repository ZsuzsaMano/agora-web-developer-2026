import type { FC } from "react";
import team1 from "../assets/team1.jpeg";
import team2 from "../assets/team2.jpeg";

interface PersonProps {
  id: number;
  name: string;
  role: string;
  image: string;
  link: string;
}

interface Frame {
  person: PersonProps | null;
}

/** cards used both in squad and search results */
export const MemberCard: FC<Frame> = ({ person }) => {
  if (person)
    return (
      <div className="shadow-[4.0px_8.0px_8.0px_rgba(222,133,180,0.3)] hover:shadow-[4.0px_8.0px_8.0px_rgba(222,133,180,0.8)] transition-shadow duration-300 rounded-md w-64 ">
        <button
          className="cursor-pointer"
          onClick={() => person.link && window.open(person.link, "_blank")}
        >
          <figure>
            <div className="rounded-md ">
              <img
                src={team1 || team2}
                width={300}
                height={300}
                alt={person.name || ""}
                className="rounded-md"
              />
            </div>
            <figcaption className="pt-2 pb-4">
              <h2>{person.name}</h2>
              <p>{person.role}</p>
            </figcaption>
          </figure>
        </button>
      </div>
    );
};
